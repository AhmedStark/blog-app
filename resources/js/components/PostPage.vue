<template>
<div>
<v-container>
    <v-snackbar v-model="snackbar" top :timeout="3000" >{{ snackbarContent }}<v-btn dark flat  color="red" @click="snackbar = false">Close</v-btn> </v-snackbar>
    <v-card>
        <v-card-title class="display-1">
            <v-layout>
                {{title}}   
                
                <v-spacer></v-spacer>
                
                    <div class="text-xs-center" v-if="admin">
                        <v-menu offset-y>
                        <template v-slot:activator="{ on }">
                            <v-btn
                            color="teal"
                            dark
                            v-on="on"
                            icon

                            >
                            <v-icon>
                                settings
                            </v-icon>
                            
                            </v-btn>
                        </template>
                        <v-list class="trans" >
                            
                            <v-list-tile class="list-tile" :href="'/posts/edit/'+id">
                                <v-list-tile-title >
                                    Edit
                                </v-list-tile-title>
                            </v-list-tile>
                                
                            <v-list-tile class="list-tile" @click="confirm">
                                <v-list-tile-title >
                                    Delete
                                </v-list-tile-title>
                            </v-list-tile>
                            
                            <form action="/post/delete" method="post" ref="deleteForm">
                                <input type="hidden" name="id" :value="id"/>
                                <input type="hidden" name="_token" :value="csrf" />
                                
                                
                            </form>
                            
                        </v-list>
                        </v-menu>
                    </div>
                <confirm @confirmed="submitForm" ref="submit_confirm">
                    <div slot="content">
                        Are you sure you want to delete this post?
                    </div>
                </confirm>

            </v-layout>
        </v-card-title>
        <v-card-text  class='content'>
        <v-layout>
            <v-flex class="mx-2" md12 >
                <div v-html="content">

                </div>
            </v-flex>

        </v-layout>
        <br>
        <br>
            <comment-section :id="id"></comment-section>
        </v-card-text>
        
    </v-card>
</v-container> 

</div>

</template>
<script>
export default {
    props:{
        snackbarStatus:{default:false,type:Boolean},
        
        snackbarPassedContent:{
            type:String,default:""
        },
        id:{
            default:'',
            type:String
        },
        title:{
            default:'',
            type:String
        },
        content:{
            default:'',
            type:String
        }

    },
    data(){
        return{
            admin:false,
            snackbar:this.snackbarStatus,
            snackbarContent:this.snackbarPassedContent,
            comment:"",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },methods:{
        submitForm:function(){
            this.$refs.deleteForm.submit();
        },
        confirm:function(){
            
            this.$refs.submit_confirm.open();
        },getUserDetails(){
            axios.get('/user-details').then((response)=> {
                this.admin = response.data.admin;
            }).catch(function(error){
            }).then((response)=> {
            });
        }
    },mounted(){
        this.getUserDetails();
    }
}
</script>
<style scope>

.content{
    min-height: 600pt;
}
.raw{
    height:500pt;
}

.comment-text{
    margin-bottom: -10pt;
}
.list-tile:hover{
    color:white;
    background: teal;
    cursor: pointer;
}
</style>

