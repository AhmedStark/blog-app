<template>
    <div>
  <v-toolbar dark app color="teal darken-4">

    <v-toolbar-title class="white--text"><b>My</b>Blog</v-toolbar-title>
    <v-spacer></v-spacer>

    <v-menu v-if="checklogin" offset-y>
      <template v-slot:activator="{ on }">
        <v-btn
          color="primary"
          dark
          v-on="on"
        >
          {{name}}
        </v-btn>
      </template>
      <v-list>
        <v-list-tile
          @click="logout"
        >
          <v-list-tile-title>Logout</v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>
    
  </v-toolbar>
  <br>
  <br>
  </div>
</template>
<script>
export default {
    props:{
        checklogin:{
            default:false,
            type:Boolean,
        },
        name:{
            default:"",
            type:String,
        }
    }
}
</script>