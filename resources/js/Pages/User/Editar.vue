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
    props:["showUser","errors" ],
    // created(){
      //  console.log({ ...this.form });
      //  this.$emit('onSubmit', { ...this.form });
   // },
    
    data() {
        return{

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
            Inertia.put(route('user.update',{'showUser': this.showUser}),data)
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
                        <UserForm @onSubmit="handleSubmit" :value="showUser" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
