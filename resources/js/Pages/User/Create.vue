<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'; 
</script>
<script>
import { Inertia } from '@inertiajs/inertia';
import JetInputError from '@/Jetstream/InputError.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetButton from '@/Jetstream/Button.vue'; 
import UserForm from '@/Components/UserForm.vue';

export default{
    props:["users","errors" ],
    data() {
        return{
            form:{
                name:"",
                email:"",
                password:"",
            },
            errors_server: []
        }
    },
    components:{
        AppLayout,
        JetInputError,
        JetInput,
        JetLabel,
        JetButton,
        UserForm,
    },
    methods:{
        handleSubmit(data){
            axios.post('/api/user',data).then((response) => {
                window.location = '/user';               
            }).catch((error) => {
                let errors = error.response?.data?.errors ?? null;
                this.errors_server = [];

                console.error(error);

                if(errors && Object.keys(errors).length){
                    /* Check for laravel errors */
                    this.errors_server = ( Object.values(errors) ).reduce((acc, val) => acc.concat(val), []); 
                }
            });
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
                         
                        <UserForm @onSubmit="handleSubmit" />
                        <ul>
                            <li v-for="(e, i) in errors_server" :key="i">{{e}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
