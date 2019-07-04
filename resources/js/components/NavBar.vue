<template>
    <div>
  <v-toolbar dark app color="teal darken-4">
    <v-spacer></v-spacer>
    <v-toolbar-title><a href="/"><b class="lime--text">My</b><b class="white--text">Blog</b></a></v-toolbar-title>
    <v-spacer></v-spacer>
    <v-spacer></v-spacer>
    <v-toolbar-items v-if="!checklogin">

      <v-btn flat href='/login'>
        Login
      </v-btn>
      <v-btn flat href="/signup">
        Sign up
      </v-btn>

    </v-toolbar-items>
    <v-btn flat icon @click="changeMode">
      <v-icon v-if="darkMode" dark falt>
        wb_sunny
      </v-icon>
      <v-icon v-else  dark falt>
        brightness_3
      </v-icon>
    
    </v-btn>
    <v-menu v-if="checklogin" offset-y>
      <template v-slot:activator="{ on }">
        <v-btn icon
          flat
          dark
          v-on="on"
        >
          <v-icon>account_circle</v-icon>
        </v-btn>
      </template>
      <v-list>
      <v-form id="logout" action="/logout" method="post">
        <input type="hidden" name="_token" :value="csrf" /> 
        <v-list-tile dark>
          
            <v-btn type="submit"  form="logout">
              Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
            </v-btn>
            
        </v-list-tile>
      </v-form>
      </v-list>
    </v-menu>

    <v-spacer></v-spacer>
  </v-toolbar>
  <br>
  <br>
  </div>
</template>

<script>

var VueCookie = require('vue-cookie');

export default {
    
    data(){
      return{
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        checklogin:false,
        name:"",
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        darkMode:VueCookie.get("dark_mode")=="on",
          }
    },methods:{
      changeMode:function(){
          VueCookie.get("dark_mode")=="on" ? VueCookie.set('dark_mode', 'off'):VueCookie.set("dark_mode","on");
          this.$emit('changeMode');
          this.darkMode=!this.darkMode;
        },getUserDetails:function(){
        axios.get('/user-details').then((response)=> {
            console.log(response.data['admin'])
            this.checklogin = response.data.logged_in;
        }).catch(function(error){
        }).then((response)=> {
        });
      }
    },mounted(){
      this.getUserDetails();

    }
}
</script>
