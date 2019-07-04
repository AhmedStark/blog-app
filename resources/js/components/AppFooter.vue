<template>
  <v-footer
    dark
    height="auto"
  >
    <v-card
      class="flex"
      flat
      tile
    >
      <v-card-title class="teal darken-4">
        <strong class="subheading">Find me on social networks!</strong>
      </v-card-title>
        <v-spacer></v-spacer>

        <div class="text-xs-center">
              
                <dir :class="admin?'':'hide'" v-if="admin">
                  <social-media-dialog ref="social_form"></social-media-dialog>
                  <v-btn
                    v-for="icon in icons"
                    :key="icon.id"
                    class="mx-3"
                    dark
                    icon
                    v-on:click="showAdminDialog"
                  >
                    <v-icon size="24px">{{ icon.icon }}</v-icon>
                </v-btn>

                </dir>
                <div :class="admin?'hide':''" v-else>
                  <v-btn
                    v-for="icon in icons"
                    :href="icon.link"
                    :key="icon.id"
                    class="mx-3"
                    dark
                    icon
                  >
                    <v-icon size="24px">{{ icon.icon }}</v-icon>
                  </v-btn>
                </div>
          </div>

      <v-card-actions class="grey darken-3 justify-center">
        &copy;Ahmed Aldawoud <strong></strong>
      </v-card-actions>
    </v-card>
  </v-footer>
</template>

<script>

const axios = require('axios');
  export default {
    
    data (){
      return{
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        dialog: false,
        admin:false,
        icons:[
          {link:"",icon:""},{link:"",icon:""},{link:"",icon:""},{link:"",icon:""}
        ]
      }
      
    },methods:{
      getLinks:function(){
        axios.get('/social').then((response)=> {
            this.icons=response.data;
            console.log(response.data)
        }).catch(function(error){
        }).then((response)=> {
        });
        
      },getUserDetails:function(){
        axios.get('/user-details').then((response)=> {
            console.log(response.data['admin'])
            this.admin = response.data.admin;
        }).catch(function(error){
        }).then((response)=> {
        });
      },showAdminDialog:function(){
        this.$refs.social_form.open();
      }
    },mounted(){
      this.getLinks();
      this.getUserDetails();
    }
  }
</script>
<style>
.hide{
    visibility: hidden;
}
</style>

