<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'; 

</script>
<script>
import { Inertia } from '@inertiajs/inertia';
export default{
    props:["users","errors" ],
    data() {
        return{
            name:"nom",
            email:"dasd@gmail.com",
            password:" nulldsdsds"
        }
    },
    components:{
        AppLayout,
    },
    methods:{
        submit(){
            Inertia.post(route('user.store'),{
                name: this.name,
                password: this.password,
                email: this.email,
            })
        },
    }
};
</script>


<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        {{errors}}
                        <form @submit.prevent="submit"> 
                       <label>Nombre:</label>
                       <input type="text" v-model="name"/>
                        <label >Email:</label>
                       <input type="text" v-model="email"/>
                        <label >Contraseña:</label>
                       <input type="password" v-model="password"/>

                       <button type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
