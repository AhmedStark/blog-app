<template>
    <div>
  <v-toolbar dark app color="teal darken-4">
    <v-spacer></v-spacer>
    <v-toolbar-title><a href="/"><b class="lime--text">My</b><b class="white--text">Blog</b></a></v-toolbar-title>
    <v-spacer></v-spacer>
    <v-spacer></v-spacer>
    <v-toolbar-items v-if="checklogin">

      <v-btn flat href='/login'>
        Login
      </v-btn>
      <v-btn flat href="/signup">
        Sign up
      </v-btn>

    </v-toolbar-items>
    
    <v-menu v-if="!checklogin" offset-y>
      <template v-slot:activator="{ on }">
        <v-btn fab
          color="teal darken-1"
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
export default {
    props:{
        checklogin:{
            default:true,
            type:Boolean,
        },
        name:{
            default:"Ahmed",
            type:String,
        }
    },
    data(){
      return{
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

          }
    },
}
</script>