<script setup>

  import { ref, computed } from 'vue'
  //import { useRoute } from 'vue-router';
  import Home from './home.vue'
  import Login from './Login.vue'
  const routes = {
  '/': Home,
  '/login': Login,
  '/home': Home,

  }
  const currentPath = ref(window.location.hash)
  window.addEventListener('hashchange', () => {
  currentPath.value = window.location.hash
  })
  const currentView = computed(() => {
  let s=currentPath.value.slice(1);
  //alert(s);
  let s2=s.indexOf("?")
  //alert(s2);
  if(s2!=-1)
  s=s.substr(0,s2)
  const tokenString = localStorage.getItem('token');
  const userToken = JSON.parse(tokenString);
  //alert(JSON.stringify(userToken))
  let token=userToken?.success;
  if(token==undefined || token.length<10) {
   // alert(token)
  return routes[ '/login' || '/'] || NotFound
  }
  //alert(s)
  return routes[ s || '/'] || NotFound
  })

</script>

<template>

  <component :is="currentView" />

</template>
