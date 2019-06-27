<template>
<div>
<v-container>
    <v-card>
    <v-card-title class="display-1">Create post</v-card-title>
    <v-card-text>
    <v-layout  class="ma-3">
        <v-flex md4>
        <v-text-field
            label="Title"
            placeholder="My awesome blog"
        ></v-text-field>
        </v-flex>
        <v-spacer></v-spacer>
        <v-flex md2>
            <v-btn class="green" dark large>Publish <v-icon class="ml-1">publish</v-icon></v-btn>
        </v-flex>
        
    </v-layout>
    
    <Vueditor ref="editor" class="ma-3 raw" ></Vueditor>
    </v-card-text>
    </v-card>
</v-container> 
</div>


</template>
<script>
export default {
    data(){
        return{
            title:"",
            content:""
        }
    },methods:{
        save:function(){ 
            this.content = this.$refs.editor.getContent();
        },
    }
}
</script>
<style scope>
.raw{
    height:500pt;
}
</style>

