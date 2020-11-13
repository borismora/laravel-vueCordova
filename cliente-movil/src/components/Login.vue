<template>

    <div>
        <v-layout row justify-center>
            <v-dialog v-model="dialog" persistent max-width="290">
            <v-card>
                <v-card-title class="headline">ERROR: acceso restringido</v-card-title>
                <v-card-text>Esta aplicación móvil esta habilitada sólo para estudiantes egresados que se encuentren debidamente inscritos.</v-card-text>
                <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="green darken-1" flat @click.native="dialog = false">Aceptar</v-btn>
                </v-card-actions>
            </v-card>
            </v-dialog>
        </v-layout>


    
        <v-card flat>
            <img id="foto_img" src="../assets/logo.png" height="200px">
        
        </v-card>

        <v-card-text>
            <v-form>
                <v-text-field prepend-icon="person" label="Usuario" type="text" v-model="username" :rules="usernameRules"></v-text-field>
                <v-text-field prepend-icon="lock" label="Contraseña" type="password" v-model="password" :rules="passwordRules"></v-text-field>
            </v-form>
        </v-card-text>

        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="primary" block outline round v-on:click="conectar">Ingresar</v-btn>
        </v-card-actions>

        <v-card-actions>
            <v-spacer></v-spacer>
            <span style="text-align: center;">{{error}}</span>
        </v-card-actions>
        
    </div>

</template>


<script>

import Vue from 'vue'

export default {
    data: function() {
        return{
            username: "",
            password: "",
            usuarios: "",
            error: "",
            usernameRules: [
                v => !!v || 'Este campo es requerido',
                v => v.length <= 10 || 'RUT debe tener menos de 10 caracteres',
                v => v.length >= 6 || 'RUT debe tener al menos 6 caracteres'
            ],
            passwordRules: [
                v => !!v || 'Este campo es requerido',
                v => v.length <= 14 || 'La contraseña debe tener menos de 14 caracteres',
                v => v.length >= 6 || 'La contraseña debe tener al menos 6 caracteres'
            ],
            dialog: false,
        }
    },
    methods: {
        //inicia sesion
        conectar: function(){

            /*
            console.log(this.$client_id)
            console.log(this.$client_secret)
            console.log(this.$grant_type)
            console.log(this.$token)
            */

            
            var urlKeeps = 'http://'+this.$ip_servidor+':8000/oauth/token';
            axios.post(urlKeeps, {
                //se asignan las variables globales ubicadas en main.js
                client_id: this.$client_id,
                client_secret: this.$client_secret,
                grant_type: this.$grant_type,
                username: this.username,
                password: this.password
            },
            {
                headers: { 'Content-Type': 'application/json' }
            }
            ).then(response => {
                Vue.prototype.$token = response.data.access_token,
                //console.log(this.$token)
                Vue.prototype.$username = this.username,
                this.error = '',
                this.getId()
            }).catch(error => {
                this.errors = 'No se pudo crear su servicio';
                this.error = "Usuario y/o contraseña no validos"
            });
            


            /*
            var urlKeeps = 'http://192.168.0.13:8000/api/auth';
                axios.get(urlKeeps).then(response => {
                    this.usuarios = response.data;
                });
              */  
            
            //this.$router.replace('zzz')
        },
        //Obtiene y guarda el id del usaurio que inicia sesion
        getId: function(){
            
            var urlKeeps = 'http://'+this.$ip_servidor+':8000/api/user';
            axios.get(urlKeeps, 
            {
                headers: { 'Authorization': 'Bearer '+this.$token }
            }
            ).then(response => {
                Vue.prototype.$id_usuario = response.data.id
                this.username = '',
                this.password = '',
                this.error = ''
                if(response.data.tipo != 'admin')
                    this.$router.replace('form1')
                else
                    this.dialog = true
            }).catch(error => {
                this.error = "ERROR: acceso restringido"
            });

        }
    }
}
</script>

<style scoped>
    .ion-item{
        text-align: center;
    }
    .login{
        margin-top: 40px;
    }
    input{
        margin: 10px 0;
        width: 20%;
        padding: 15px;
    }
    button{
        margin-top: 20px;
        width: 20%;
        cursor: pointer;
    }
    p{
        margin-top: 40px;
        font-size: 13px;
    }
    p a{
        text-decoration: underline;
        cursor: pointer;
    }
</style>

