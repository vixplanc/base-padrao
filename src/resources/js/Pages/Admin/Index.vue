<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import ButtonActive from '@/Components/Buttons/ButtonActive.vue'
    import TableComponent from '@/Components/TableComponent/TableComponent.vue'
    import Painel from '@/Components/Painel.vue'
    import { Head, router, useForm } from '@inertiajs/vue3';
    import { ref, watchEffect } from 'vue';
    import TextInput from '@/Components/Input/TextInput.vue';
    import flasher from "@flasher/flasher";
    import Chip from '@/Components/Chip.vue'


    let toolsFuction = ref('role');
    let paramsUrl = {filter_matricula: '', filter_cargos: [], per_page: 0,};
    let selectedUser = ref()

    window.flasher = flasher;


    let props = defineProps({
        'users_paginated': Object,
        can: Object,
        roles: Array,
        'active-actions': Number,
        'password-actions': Number,
        'role-actions': Number,
        flash: {
            type: Object,
            default: {},

        }

    });

    watchEffect(() => {
        flasher.render(props.flash.message)
    })


    const selectUser = (user) => {
        return selectedUser.value = user;
    }

    const activeUser = (userId, active) => {
        if(active) {
            router.delete(route('admin.remove.active', userId), {
                onFinish: page => {
                    console.log(page)
                }

            })
        } else {
            router.post(route('admin.set.active', userId), {

            })
        }
    }

    const setRole = (role) => {
        if(role && selectedUser.value)
            router.post(route('admin.role.set', { user: selectedUser.value, role}), {
                onFinish: page => {
                    console.log(page)
                }
            })
        else
            console.log('não caiu')

        selectedUser.value = null


    }

    const removeRole = ( role ) => {
        let roleId;
        props.roles.forEach(e => {
            if(e.name === role )
            roleId = e.id
        });


        if(selectedUser.value && roleId)
            router.delete(route('admin.role.remove', {user: selectedUser.value , role: roleId}), {
                onFinish: page => {
                    console.log(page)
                }
        })
        else
            console.log('não caiu')
    }

    const resetPassword = () => {
        if(selectedUser.value)
            router.delete(route('admin.remove.password', selectedUser.value));
        else
            console.log('error');

        selectedUser.value = null

    }

    const getUrlParameters = () => {
        const query = location.search.slice(1)
        const dataUrl = query.split('&')

        dataUrl.forEach(e => {
            let keyValue = e.split('=');
            if(keyValue[0] == 'filter_cargos[]') {
                paramsUrl['filter_cargos'].push(keyValue[1])
            }
            else {
                paramsUrl[keyValue[0]] = keyValue[1]

            }
        })
    }

    getUrlParameters()

    const formFilter = useForm({
        filter_matricula: paramsUrl.filter_matricula ,
        filter_cargos:  [...paramsUrl.filter_cargos],
        per_page: paramsUrl.per_page,
    })

    const filterUsers = (urlink) => {
        router.get(urlink, formFilter)
    }


</script>


<template>
    {{ console.log(props) }}
    <Head title="Admin"/>
    <AuthenticatedLayout>
        <div class="py-6">
            <div class="max-w-7xl mx-auto">
                <Painel>
                    <template v-slot:header>
                        <button v-if="false" :class="toolsFuction === 'new user'?'bg-vix-green-200':'bg-zinc-600'" @click="toolsFuction = 'new user'" class="px-2 py-2 border rounded-md  text-white" > Criar Usuario </button>
                            <button :class="toolsFuction === 'role'?'bg-vix-green-200':'bg-zinc-600'" @click="toolsFuction = 'role'" class="px-2 py-2 border rounded-md text-white"> Cargos </button>
                    </template>

                    <template v-slot:tools>
                        <form class="flex flex-col" v-if="(toolsFuction === 'new user' & false)">
                            <div class="mt-4">
                                <div class="w-11/12 mx-auto flex flex-col">
                                    <div class="mb-2 flex gap-2 justify-center items-center">
                                        <label for="InputForName" class="form-label">Nome</label>
                                        <input type="text" name="name" class="w-full rounded-md" id="InputForName">
                                    </div>
                                    <div class="mb-2 flex gap-2 justify-center items-center">
                                        <label for="InputForKey" class="form-label">Matrícula</label>
                                        <input type="text" name="key" class="w-full rounded-md" id="InputForKey">
                                    </div>
                                    <div class="mb-2 flex gap-2 justify-center items-center">
                                        <!-- <select name="select">
                                            <option value="valor1">Valor 1</option>
                                            <option value="valor2" selected>Valor 2</option>
                                            <option value="valor3">Valor 3</option>
                                        </select> -->
                                        <label for="InputForLevel" class="rounded-md">Nível de Acesso</label>
                                        <select name="level" class="w-full rounded-md" id="InputForLevel">
                                            <option value="1">Deposito</option>
                                            <option value="0">Administrador</option>
                                            <!-- <option value="0">Administrador</option> -->
                                        </select>
                                    </div>
                                    <div class="mb-2 flex gap-2 justify-center items-center">
                                        <label for="InputForEmail" class="form-label">Email</label>
                                        <input type="email" name="email" class="w-full rounded-md" id="InputForEmail">
                                    </div>
                                    <button type="submit" class="px-2 py-2 border rounded-md bg-zinc-600 text-white">Registrar</button>
                                </div>
                            </div>

                        </form>

                        <div class="flex flex-col p-2" v-if="toolsFuction === 'role'">

                            <div class="w-full mt-2 flex gap-2 justify-center flex-wrap max-h-48 overflow-y-auto py-2">
                                <template v-for="(role, key) in props.roles">
                                    <button @click.prevent="setRole(role.id)" class="min-w-16 h-8 px-2 border border-vix-green-200 rounded-md shadow-sm shadow-[#5c5c5c9d] hover:opacity-85">
                                        {{ role.name }}
                                    </button>
                                </template>
                            </div>

                            <form @submit.prevent="resetPassword">
                                <button class="px-2 py-2 border rounded-md bg-green-500 text-white mt-2 hover:opacity-85">
                                    Resetar senha
                                </button>
                            </form>
                        </div>

                    </template>
                    <template v-slot:items>
                        <TableComponent :paginated="props.users_paginated" :titleName="['Matricula', 'Email', 'Cargo']" @filterPage="filterUsers" >
                            <template v-slot:headerTable>
                                    <TextInput name="Matricula" v-model="formFilter.filter_matricula"/>

                                    <div class="flex flex-col justify-center items-center">Cargos
                                        <div class="flex gap-2">
                                            <template v-for="(role, key) in props.roles">
                                                <label class="flex items-center justify-center gap-1">
                                                    <input class="rounded-full" type="checkbox" name="" id="" :value="role.name" v-model="formFilter.filter_cargos">{{ role.name }}
                                                </label>
                                            </template>
                                        </div>
                                    </div>

                                    <div class="flex gap-2 justify-center items-center"><input type="number" class="w-24 rounded-md" min="0"  v-model="formFilter.per_page" >por Página</div>
                            </template>
                            <template v-slot:tableBody>
                                <tr v-for="(userData, key) in props.users_paginated.data" @click="selectUser(userData.id)" :class="selectedUser == userData.id ?'!bg-vix-green-200/60' : ''">
                                    <th class="flex justify-center items-center gap-1">
                                        {{ userData.name }}
                                        <form @submit.prevent="activeUser(userData.id, userData.active)">
                                            <ButtonActive :active="userData.active" :edit="can.active_user" :key="key"/>
                                        </form>
                                    </th>
                                    <th>{{ userData.email }}</th>
                                    <th>
                                        <template v-for="(role, key) in userData.roles">

                                            <Chip @deleteChip="removeRole(role)">
                                                {{ role }}
                                            </Chip>
                                        </template>
                                    </th>
                                </tr>
                            </template>
                        </TableComponent>
                    </template>

                    <template v-slot:footer >
                        <div class="text-[12px] bg-yellow-100 rounded-md m-1 p-1 text-orange-900">
                            Para dar um cargo selecione um usario e depois clique no nome do cargo á esquerda.
                        </div>
                    </template>
                </Painel>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>

</style>

