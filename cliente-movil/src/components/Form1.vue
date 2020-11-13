<template>
  <div>
    
      <v-form v-model="valid">
        <v-text-field v-model="rut" :rules="rutRules" label="RUT:" v-on:keypress="isRut" required></v-text-field> 
        <v-menu ref="menu" :close-on-content-click="false" v-model="menu" :nudge-right="40" lazy transition="scale-transition" offset-y full-width min-width="290px">
          <v-text-field slot="activator" v-model="date" label="Fecha de nacimiento:" prepend-icon="event" readonly></v-text-field>
          <v-date-picker ref="picker" v-model="date" :max="new Date().toISOString().substr(0, 10)" min="1950-01-01" @change="save"></v-date-picker>
        </v-menu>
        <v-text-field v-model="nombres" :rules="genericRules" label="Nombres:" required></v-text-field>
        <v-text-field v-model="apellidos" :rules="genericRules" label="Apellidos:" required></v-text-field>
        <v-text-field v-model="titulo_acad" :rules="genericRules" label="Título:" required></v-text-field>
        <v-text-field v-model="fono_movil" :rules="genericRules" :counter="20" maxlength="20" label="Nº Teléfono Móvil:" v-on:keypress="isNumber" required></v-text-field>
        <v-text-field v-model="fono_fijo" :rules="genericRules" :counter="20" maxlength="20" label="Nº Teléfono Fijo:" v-on:keypress="isNumber" required></v-text-field>

       
        <v-btn color="primary" :disabled="!formIsValid" fixed right round v-on:click="siguiente" >Siguiente</v-btn>
    
      </v-form>

  </div>
</template>

<script>
import Vue from 'vue'

export default {
  name: 'Form1',
  data () {
    return {
      error: '',
      rut: '',
      nombres: '',
      apellidos: '',
      titulo_acad: '',
      fono_movil: '',
      fono_fijo: '',
      drawer: null,
      valid: false,
      date: null,
      menu: false,
      rutRules: [
        v => !!v || 'Este campo es requerido',
        v => v.length >= 7 || 'El RUT debe tener al menos 7 caracteres',
        v => this.validaRut() || 'RUT no valido'
      ],
      genericRules: [
        v => !!v || 'Este campo es requerido',
      ]
    }
  },
  computed: {
      formIsValid () {
        return (
          this.rut && this.rut.length >= 7 && this.validaRut() &&
          this.nombres &&
          this.apellidos &&
          this.titulo_acad &&
          this.fono_movil &&
          this.fono_fijo &&
          this.date 
        )
      }
  },
  watch: {
    menu (val) {
      val && this.$nextTick(() => (this.$refs.picker.activePicker = 'YEAR'))
    },
    rut: function(val, oldVal) {
 
 

    }
  },
  methods: {
      siguiente: function(){

          this.respalda()
          this.$router.replace('/form2')
      },
      respalda: function(){

          //Se asignan los valores del formulario a las variables globales
          Vue.prototype.$rut = this.rut
          Vue.prototype.$nombres = this.nombres
          Vue.prototype.$apellidos = this.apellidos
          Vue.prototype.$nacimiento = this.date
          Vue.prototype.$titulo_acad = this.titulo_acad
          Vue.prototype.$fono_movil = this.fono_movil
          Vue.prototype.$fono_fijo = this.fono_fijo
      },
      save (date) {
        this.$refs.menu.save(date)
      },
      isNumber: function(evt) {
          evt = (evt) ? evt : window.event;
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 32 && charCode !== 40 && charCode !== 41) {
              evt.preventDefault();;
          } else {
              return true;
          }
      },
      isRut: function(evt) {
          evt = (evt) ? evt : window.event;
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 45 && charCode !== 75 && charCode !== 107) {
              evt.preventDefault();;
          } else {
              return true;
          }
      },
      validaRut: function() {

          var rut_temp = this.rut.replace(/-/gi, ''); 
          var b = rut_temp.slice(0, rut_temp.length-1)+'-'+rut_temp.slice(rut_temp.length-1) 

          var i = 0
          if(b.match(/^([0-9])+\-([kK0-9])+$/)){
            b = b.split("-");
            var a=b[0].split(""),c=2,d=0;
            
            for(i=a.length-1;0<=i;i--)
              c = 7<c?2:c,d+=parseInt(a[i])*parseInt(c++);
              
            a = 11-d%11;
            return(11==a?0:10==a?"k":a)==b[1].toLowerCase()
          }
          
          return!1
  
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
