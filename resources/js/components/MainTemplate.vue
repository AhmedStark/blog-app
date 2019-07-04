<template>
    <v-app :dark="darkMode">
        <nav-bar v-on:changeMode="darkMode = !darkMode"  :checklogin="checklogin"></nav-bar>
        <v-container>
        <slot name="content">

        </slot>
        </v-container>
        <app-footer :admin="admin"></app-footer>
    </v-app>   

</template>
<script>

var VueCookie = require('vue-cookie');
export default {
    props:{
        
        checklogin:{type:Boolean,default:false},
        admin:{type:Boolean,default:false},
    },
    data(){
        return{
            darkMode:VueCookie.get('dark_mode')=='on',
        }
    },mounted(){
        VueCookie.get('dark_mode')===null? VueCookie.set('dark_mode','off'):null;
    }
}
</script>