<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'; 

</script>
<script>
import { Inertia } from '@inertiajs/inertia';
export default{
    props:["users"],
    data() {
        return{
            name:"Pepe",
            email:"pepe@gmail.com",
            password: "12345"
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
                   
                        <form @submit.prevent="submit">

                       <label for="">Nombre:</label>
                       <input type="text" v_model="name"/>
                        <label for="">Email:</label>
                       <input type="text" v_model="email"/>
                        <label for="">Contraseña:</label>
                       <input type="password" v_model="password"/>

                       <button type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
