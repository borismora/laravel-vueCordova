import Vue from 'vue'
import Router from 'vue-router'

//Se importan los componentes
import Login from '@/components/Login'
import Form1 from '@/components/Form1'
import Form2 from '@/components/Form2'
import Form3 from '@/components/Form3'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login
    },
    {
      path: '/form1',
      name: 'Form1',
      component: Form1
    },
    {
      path: '/form2',
      name: 'Form2',
      component: Form2
    },
    {
      path: '/form3',
      name: 'Form3',
      component: Form3
    }
  ]
})
