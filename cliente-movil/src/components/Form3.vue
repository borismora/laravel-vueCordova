<template>
  <div>

    <!-- Dialog que muestra si se puedieron ingresar o no los datos -->
    <v-layout row justify-center>
            <v-dialog v-model="dialog" persistent max-width="290">
            <v-card>
                <v-card-title v-if="exito == true" class="headline">Felicidades</v-card-title>
                <v-card-text v-if="exito == true">Los datos han sido ingresados correctamente.</v-card-text>

                <v-card-title v-if="exito == false" class="headline">Lo sentimos</v-card-title>
                <v-card-text v-if="exito == false">Hubo un problema al enviar o ingresar sus datos.</v-card-text>

                <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn v-if="exito == true" color="green darken-1" flat v-on:click="Salir">Salir</v-btn>
                <v-btn v-if="exito == false" color="green darken-1" flat @click.native="dialog = false">Aceptar</v-btn>
                </v-card-actions>
            </v-card>
            </v-dialog>
        </v-layout>


    
    <v-form v-model="valid">
        <v-text-field v-model="email" :rules="emailRules" label="Email Personal:" required></v-text-field>

        <p class="image is-4by3">
            <img id="foto_img" v-if="imagePath == ''" src="../assets/0028526339.jpg">
            <img id="foto_img" v-if="imagePath != ''" :src="imagePath">
        </p>

        <br>
        <b-field class="file">
            <b-upload v-model="files" required>
                <a class="button is-info">
                    <v-icon right dark>cloud_upload</v-icon>
                    <span> &nbsp; Subir imágen</span>
                </a>
            </b-upload>
            <span class="file-name"
                v-if="files && files.length">
                {{ files[0].name }}
            </span>
        </b-field>

        <!--  <v-btn color="success" fixed left round v-on:click="tomarFoto" >Tomar foto</v-btn>  -->
        
        <br>
        <v-btn color="warning" fixed left round v-on:click="anterior" >Anterior</v-btn>
        <v-btn color="success" :disabled="!formIsValid" fixed right round v-on:click="finalizar" >Finalizar</v-btn>

    </v-form>

  </div>
</template>

<script>
import Vue from 'vue'
import Buefy from 'buefy'
import 'buefy/lib/buefy.css'

Vue.use(Buefy)

document.addEventListener("deviceready", onDeviceReady, false);
function onDeviceReady() {
    console.log(navigator.camera);
}

export default {
  name: 'Form3',
  data () {
    return {
      email: '',
      drawer: null,
      valid: false,
      date: null,
      menu: false,
      //Para el mensaje tipo dialog
      dialog: false,
      exito: false,
      //Reglas
      genericRules: [
        v => !!v || 'Este campo es requerido',
      ],
      emailRules: [
        v => !!v || 'el campo "E-mail" es requerido',
        v => /.+@.+/.test(v) || 'El E-mail debe ser válido'
      ],
      //Para subir la foto
      files: [],
      imagen: {
          image: [],
          url: []
      },
      imagePath: '',
    }
  },
  computed: {
      formIsValid () {
        return (
          /.+@.+/.test(this.email) &&
          this.files.length > 0 || this.imagePath != ''
        )
      }
  },
  watch: {
    menu (val) {
      val && this.$nextTick(() => (this.$refs.picker.activePicker = 'YEAR'))
    },
    files: function(val, oldVal) {
          
        var output = document.getElementById('foto_img')
        output.src = URL.createObjectURL(this.files[0])
        
        this.imagen.url.push(this.files[0].name);
        
        var fileReader = new FileReader();
        fileReader.readAsDataURL(this.files[0]);
        
        fileReader.onload = (event) => {
            this.imagen.image.push(event.target.result);
        }
    }
  },
  methods: {
      anterior: function(){

          this.$router.replace('/form2')
      },
      finalizar: function(){

          //this.$router.replace('/form3')
          /*
          console.log('\n-----------------FORM1:')
          console.log(this.$rut)
          console.log(this.$nombres)
          console.log(this.$apellidos)
          console.log(this.$nacimiento)
          console.log(this.$titulo_acad)
          console.log(this.$fono_movil)
          console.log(this.$fono_fijo)
          
          console.log('\n\n-----------------FORM2:')
          console.log(this.$facebook)
          console.log(this.$direccion)
          console.log(this.$anyo_ingreso)
          console.log(this.$anyo_egreso)
          console.log(this.$fecha_examen)
          console.log(this.$titulo_tm)
          console.log(this.$profesor)
          
          console.log('\n\n-----------------FORM3:')
          console.log(this.email)
          console.log(this.imagen.image)
          console.log(this.imagen.url)
          */

        
        var urlKeeps = 'http://'+this.$ip_servidor+':8000/api/egresado';
          axios.post(urlKeeps, {

                id_usuario: parseInt(this.$id_usuario),

                //Datos de contacto
                fono_movil: this.$fono_movil,
                fono_fijo: this.$fono_fijo,
                email: this.email,
                facebook: this.$facebook,
                direccion: this.$direccion,

                //Datos de egreso
                titulo: this.$titulo_acad,
                anyo_ingreso: parseInt(this.$anyo_ingreso),
                anyo_egreso: parseInt(this.$anyo_egreso),
                fecha_examen: this.$fecha_examen,
                titulo_tm: this.$titulo_tm,
                profesor: this.$profesor,

                //Datos de egreso
                rut: this.$rut,
                nombres: this.$nombres,
                apellidos: this.$apellidos,
                nacimiento: this.$nacimiento,
                fotoUrl: this.imagen.url,
                fotoNombre: this.imagen.image

            },
            {
                headers: { 'Authorization': 'Bearer '+this.$token }
            }
            ).then(response => {
                console.log(response.data)
                this.exito = true
                this.dialog = true
            }).catch(error => {
                this.exito = false
                this.dialog = true
            });


      },
      save (date) {
        this.$refs.menu.save(date)
      },
      tomarFoto: function(){

          if (navigator.camera) {
            navigator.camera.getPicture(this.setPicture, this.error, { quality: 50,
                destinationType: Camera.DestinationType.DATA_URL
            });
          }
          else{
              // If the navigator.camera is not available display generic error to the user.
              this.error();
          }
      },
      // Set the picture path in the data of the vue
      // this action will automatically update the view.
      setPicture(imagePath){
        this.imagePath = "data:image/jpeg;base64," + imagePath;

        this.imagen.url.push('foto.jpg');
        
        var fileReader = new FileReader();
        fileReader.readAsDataURL(imagePath);
        
        fileReader.onload = (event) => {
            this.imagen.image.push(event.target.result);
        }

      },
      error(){
        console.log("error")
      },
      Salir: function(){
          this.dialog = false
          this.$router.replace('/')
      }

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
