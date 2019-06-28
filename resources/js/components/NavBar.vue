<template>
    <div>
  <v-toolbar dark app color="teal darken-4">
    <v-spacer></v-spacer>
    <v-toolbar-title class="white--text"><b>My</b>Blog</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-spacer></v-spacer>
    <v-menu v-if="checklogin" offset-y>
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
        <v-list-tile @click="logout">
          <v-list-tile-title>
            Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
          </v-list-tile-title>
        </v-list-tile>
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
    }
}
</script>