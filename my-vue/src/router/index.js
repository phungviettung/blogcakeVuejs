import Vue from 'vue'
import Router from 'vue-router'
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios,axios);

import HelloWorld from '@/components/HelloWorld'
import Contact from '@/components/Contact'
import Form from '@/components/Form'
import Post from '@/components/Post'
import PostDetail from '@/components/PostDetail'
import PostAdd from '@/components/PostAdd'
import PostEdit from '@/components/PostEdit'
import PostDelete from '@/components/PostDelete'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/contact',
      name: 'Contact',
      component: Contact
    },
    {
      path: '/form',
      name: 'Form',
      component: Form
    },
    {
      path: '/post',
      name: 'Post',
      component: Post
    },
    {
      path: '/postdetail',
      name: 'PostDetail',
      component: PostDetail
    },
    {
      path: '/postadd',
      name: 'PostAdd',
      component: PostAdd
    },
    {
      path: '/postedit',
      name: 'PostEdit',
      component: PostEdit
    },
    {
      path: '/postdelete',
      name: 'PostDelete',
      component: PostDelete
    },
  ]
})
