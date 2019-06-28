<template>
<div class="text-xs-center">
    <v-dialog
      v-model="dialog"
      width="500"
    >

      <v-card>
        <v-card-title
          class="headline grey lighten-2"
          primary-title
        >
          Confirm
        </v-card-title>
            
        <v-card-text>
          <slot name="content">

            </slot>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="red"
            flat
            @click="dialog = false"
          >
            no
          </v-btn>
          <v-btn
            color="blue"
            flat
            @click="confirm"
          >
            yes
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    </div>
       
    </template>
    <script>
    export default {
        data(){
            return{
                dialog:false
                }
        },methods:{
            open:function () {
                if(this.dialog){
                    this.dialog = false;
                }else{
                    this.dialog = true;
                }
            },confirm:function(){

                    this.$emit("confirmed");
                    this.open();
            }
        }
    }
    </script>