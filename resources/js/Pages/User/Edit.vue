<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'; 
</script>
<script>
import { Inertia } from '@inertiajs/inertia';
import JetInputError from '@/Jetstream/InputError.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetButton from '@/Jetstream/Button.vue'; 
export default{
    props:["showUser","errors" ],
    name:'EditForm',
    data() {
        return{
            form:{
                  name: this.showUser.name,
            email:this.showUser.email,
            password:"",
            },
        }
    },
    components:{
        AppLayout,
        JetInputError,
        JetInput,
        JetLabel,
        JetButton,
    },
    methods:{
        submit(){
            Inertia.put(route('user.update',{'showUser': this.showUser}),this.form)
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
                    <div class="mt-4">
                       <jet-label value="Nombre:"/>
                        <jet-input-error :message="errors.name"/>
                       <jet-input class="mt-1 block w-full" type="text" v-model="form.name"/>
                    </div>
                    <div class="mt-4">
                       <jet-label value="Email:"/>
                       <jet-input-error :message="errors.email"/>
                      <jet-input class="mt-1 block w-full" type="text" v-model="form.email"/>
                       </div>
                        <div class="mt-4">
                        <jet-label value="Password:"/>
                        <jet-input-error :message="errors.password"/>
                       <jet-input class="mt-1 block w-full"  type="password" v-model="form.password"/>
                        </div>

                       <jet-button class="mt-4" type="submit">Enviar</jet-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
