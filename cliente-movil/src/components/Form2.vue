<template>
  <div>

    <v-form v-model="valid">
        <v-menu ref="menu" :close-on-content-click="false" v-model="menu" :nudge-right="40" lazy transition="scale-transition" offset-y full-width min-width="290px">
          <v-text-field :rules="genericRules" slot="activator" v-model="date" label="Fecha Examen de Titulo:" prepend-icon="event" readonly></v-text-field>
          <v-date-picker ref="picker" v-model="date" :max="new Date().toISOString().substr(0, 10)" min="1950-01-01" @change="save"></v-date-picker>
        </v-menu>
        <v-text-field v-model="facebook" :rules="genericRules" label="Facebook:" required></v-text-field>
        <v-text-field v-model="direccion" :rules="genericRules" maxlength="100" label="Dirección Actual:" required></v-text-field>
        <v-text-field v-model="anyo_ingreso" :rules="yearRules" :counter="4" label="Año de Ingreso:" v-on:keypress="isNumber" maxlength="4" required></v-text-field>
        <v-text-field v-model="anyo_egreso" :rules="yearRules" :counter="4" label="Año de Egreso:" v-on:keypress="isNumber" maxlength="4" required></v-text-field>
        <v-text-field v-model="titulo_tm" :rules="genericRules" maxlength="100" label="Titulo Tesis o Memoria:" required></v-text-field>
        <v-text-field v-model="profesor" :rules="genericRules" maxlength="100" label="Profesor Guía:" required></v-text-field>

     
        <v-btn color="warning" fixed left round v-on:click="anterior" >Anterior</v-btn>
        <v-btn color="primary" :disabled="!formIsValid" fixed right round v-on:click="siguiente" >Siguiente</v-btn>

    </v-form>

  </div>
</template>

<script>
import Vue from 'vue'

export default {
  name: 'Form2',
  data () {
    return {
      anyo_ingreso: '',
      anyo_egreso: '',
      fecha_examen: '',
      titulo_tm: '',
      profesor: '',
      facebook: '',
      direccion: '',
      drawer: null,
      valid: false,
      date: null,
      menu: false,
      //Reglas
      genericRules: [
        v => !!v || 'Este campo es requerido'
      ],
      yearRules: [
        v => !!v || 'Este campo es requerido',
        v => v.length == 4 || 'Este campo debe tener 4 caracteres'
      ],
      
    }
  },
  computed: {
      formIsValid () {
        return (
          this.anyo_ingreso && this.anyo_ingreso.length == 4 &&
          this.anyo_egreso && this.anyo_egreso.length == 4 &&
          this.date &&
          this.titulo_tm &&
          this.profesor &&
          this.facebook &&
          this.direccion 
        )
      }
  },
  watch: {
    menu (val) {
      val && this.$nextTick(() => (this.$refs.picker.activePicker = 'YEAR'))
    }
  },
  methods: {
      anterior: function(){

          this.respalda()
          this.$router.replace('/form1')
      },
      siguiente: function(){

          this.respalda()
          this.$router.replace('/form3')
      },
      respalda: function(){

            //Se asignan los valores del formulario a las variables globales
            Vue.prototype.$facebook = this.facebook
            Vue.prototype.$direccion = this.direccion
            Vue.prototype.$anyo_ingreso = this.anyo_ingreso
            Vue.prototype.$anyo_egreso = this.anyo_egreso
            Vue.prototype.$fecha_examen = this.date
            Vue.prototype.$titulo_tm = this.titulo_tm
            Vue.prototype.$profesor = this.profesor
      },
      save (date) {
        this.$refs.menu.save(date)
      },
      isNumber: function(evt) {
          evt = (evt) ? evt : window.event;
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if ((charCode > 31 && (charCode < 48 || charCode > 57))) {
              evt.preventDefault();;
          } else {
              return true;
          }
      },
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
