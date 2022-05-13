<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'; 

</script>
<script>
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import JetDialogModal from '@/Jetstream/DialogModal.vue';
import JetButton from '@/Jetstream/Button.vue'; 

export default{
    props:['users'],
    data(){
        return{
           modalOpen:false,
           selectedUser:Object
        }
    },
    components:{
        Link,
        JetDialogModal,
        JetButton,
    },
    methods:{
        deleteUser(){
        /*    if(!confirm("¿Seguro que quieres eliminar el usuario: "+data.name+"?"))
            return;*/
            Inertia.delete(route("user.destroy", {showUser: this.selectedUser}))
            this.modalOpen=false
        },
        handleOpenModal(user){
            this.modalOpen = true;
            this.selectedUser = user
        },
        handleCloseModal(){
            this.modalOpen = false;
            this.selectedUser = null;
        }
    }
}
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
                        
                        <Link :href="route('user.create')">Crear Usuario </Link>
                     <!--{{users}}-->

                     <table class="table-auto w-full">
                         <thead>
                             <tr>
                                 <th class="p-3">ID</th>
                                 <th class="p-3">Nombre</th>
                                 <th class="p-3">Email</th>
                                 <th class="p-3">Acciones</th>
                             </tr>
                         </thead>
                         <tbody>
                            <tr v-for="u in users" :key="u.id">
                                <td class="p-3 border">{{u.id}}</td>
                                <td class="p-3 border">{{u.name}}</td>
                                <td class="p-3 border">{{u.email}}</td>
                                  <Link :href="route('user.show', { 'showUser' : u })">Ver</Link>
                                  <Link :href="route('user.edit', { 'showUser' : u })">Editar</Link>
                                
                                 <!-- <Link method="DELETE" :href="route('user.destroy', { 'showUser' : u })">Eliminar</Link>-->

                                  <button @click="handleOpenModal(u)">Eliminar</button>
                            </tr>
                         </tbody>       
                     </table>
                     
                
                    </div>
                </div>
            </div>
        </div>
          <jet-dialog-modal :show="modalOpen">
            <template #title>
                <h1>Eliminar Usuario</h1>
            </template> 
            <template v-slot:content>
                <h1 v-if="selectedUser">¿Seguro que quieres eliminar al usuario: {{selectedUser.name}} ?</h1>
            </template> 
            <template v-slot:footer>
                <jet-button  @click="deleteUser">Eliminar</jet-button>
                <jet-button class="bg-red-500 hover:bg-red-800" @click="handleCloseModal()">Cerrar</jet-button>
            </template>
         </jet-dialog-modal>
    </AppLayout>
</template>
