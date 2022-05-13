 <script>
  import JetInputError from '@/Jetstream/InputError.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetButton from '@/Jetstream/Button.vue'; 
import { ref } from '@vue/reactivity';

export default{
    name:'UserForm',
    props: {
        value: Object
    },
    components:{
        JetInputError,
        JetInput,
        JetLabel,
        JetButton,
    },

    created(){
        if (this.value){
            this.form = { ...this.form, ...this.value };
            this.edit_mode = true;
        }
    },

    data: () => ({
        
        error:{
            name:false,
            email:false,
            password:false,
        },
        form:{
            name:"",
            email:"",
            password:"",
        },
        edit_mode: false,
    }),
    
    methods:{
        handleSubmit(){
            this.error.name = !this.form.name;
            this.error.email = !this.form.email;
            this.error.password = this.edit_mode? false : !this.form.password;
          
            if(!this.error.name && !this.error.email && !this.error.password)
                this.$emit('onSubmit', { ...this.form });
        },
    }
};
 </script>
 
<template>
    <div>
        <form @submit.prevent="handleSubmit">
            <div class="mt-4">
                <jet-label value="Nombre:"/>
                <jet-input-error v-if="error.name" message="Falta el nombre del usuario"/>
                <jet-input class="mt-1 block w-full" type="text" v-model="form.name"/>
            </div>
            <div class="mt-4">
                <jet-label value="Email:"/>
                <jet-input-error v-if="error.email" message="Falta el email del usuario"/>
                <jet-input class="mt-1 block w-full" type="text" v-model="form.email"/>
            </div>
            <div class="mt-4">
                <jet-label value="Password:"/>
                <jet-input-error v-if="error.password" message="Falta la contraseña del usuario"/>
                <jet-input class="mt-1 block w-full"  type="password" v-model="form.password"/>
            </div>

            <jet-button class="mt-4" type="submit">Enviar</jet-button>
        </form>
    </div>
</template>