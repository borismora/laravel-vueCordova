<template>
    <!-- PLANTILLA PARA LOS DEMAS COMPONENTES -->
    <v-app id="inspire">

      <v-navigation-drawer clipped fixed v-model="drawer" app>
        <v-list dense>

          <v-list-tile avatar>
            <v-list-tile-avatar>
              <img src="data:image/png;base64,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" >
            </v-list-tile-avatar>

            <v-list-tile-content>
              <v-list-tile-title>{{$username}}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>

          <v-list-tile @click="desconectar">
            <v-list-tile-action>
              <v-icon>remove_circle</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title>Cerrar sesión</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>

        </v-list>
      </v-navigation-drawer>

      <v-toolbar app fixed clipped-left dark color="light-blue darken-4">
        <v-toolbar-side-icon v-if="$route.path != '/'"  @click.stop="drawer = !drawer"></v-toolbar-side-icon>
        <v-toolbar-title>Egresados UCM</v-toolbar-title>
      </v-toolbar>


      <v-content>
        <v-container fluid fill-height class="white">
          <v-layout justify-center >
            <v-flex>
                <keep-alive>
              <!-- Aqui se mostrara el contenido de las rutas -->
              <router-view/>
                </keep-alive>

            </v-flex>
          </v-layout>
        </v-container>
      </v-content>


      <v-footer app fixed class="light-blue darken-4">
        <span class="white--text"> &nbsp; Universidad Católica del Maule &copy; </span>
      </v-footer>
    </v-app>
</template>

<script>
import Vue from 'vue'

export default {
  name: 'App',
  data: function() {
      return{
          drawer: null
      }
  },
  methods: {
      desconectar: function(){

          this.$router.replace('/')
      }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
