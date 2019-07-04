<template>
 <v-dialog
          v-model="dialog"
          width="500"
        >
        <v-card>
                <form id="social" action="/social" method="post">

                      
                    <input type="hidden" name="_token" :value="csrf" />

                    <v-card-title
                      class="headline grey lighten-2"
                      primary-title
                    >
                      Change my social media Links
                    </v-card-title>

                    <v-card-text>
                    <v-text-field
                        name="facebook"
                        label="Facebook link"
                        required
                        class="mx-4"
                        :value = "icons[0].link"
                      ></v-text-field>

                      <v-text-field
                        name="twitter"
                        label="Twitter link"
                        required
                        class="mx-4"
                        :value = "icons[1].link"
                      ></v-text-field>

                      <v-text-field
                        name="linkedin"
                        label="LinkedIn link"
                        required

                        :value = "icons[2].link"
                        class="mx-4"
                      ></v-text-field>

                      <v-text-field
                        name="insta"
                        :value = "icons[3].link"
                        label="Instagram link"
                        required
                        class="mx-4"
                      ></v-text-field>
                    
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn
                        color="primary"
                        flat
                        @click="dialog = false"
                      >
                        Cancel
                      </v-btn>
                      <v-btn
                        form="social"
                        color="primary"
                        flat
                        type="submit"
                        @click="dialog = false"
                      >
                        Done
                      </v-btn>
                    </v-card-actions>

                  </form>
              </v-card>
 </v-dialog>
</template>
<script>
export default {
    data(){
        return{
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            dialog:false,
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
        
      },open(){
          this.dialog = !this.dialog;
      }
    },mounted(){
        this.getLinks();
    }
}
</script>