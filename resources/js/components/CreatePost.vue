<template>
<div>
<v-container>

    <v-card>

        <v-card-title class="display-1">Create post</v-card-title>

        <v-card-text>
            <p v-html="response"></p>
            <form action="/store-post" method="post" ref='post_form'>
                <v-layout  class="ma-3">
                    <v-flex md4>
        
                        <v-text-field name='title'
                            label="Title"
                            placeholder="My awesome blog"
                        >
                        </v-text-field>

                    </v-flex>

                    <v-spacer></v-spacer>

                    <v-flex md2>
                        <v-btn @click="confirm" class="green" dark large>
                            Publish 
                            <v-icon class="ml-1">publish</v-icon>
                        </v-btn>
                    </v-flex>

                    <confirm @confirmed="submitForm" ref="submit_confirm">
                        <div slot="content">
                            Are you sure you want to publish this post?
                        </div>
                    </confirm>

                </v-layout>

                <input type="hidden" name="_token" :value="csrf" />

                <input type="hidden" value="" name='content' ref='content'/>

                <Vueditor ref="editor" class="ma-3 raw" ></Vueditor>
            </form>

        </v-card-text>
    </v-card>
</v-container> 

</div>

</template>



<script>
export default {
    props:{
        response:{
            default:'',
            type:String
        },
    },
    data(){
        return{
            title:"",
            content:"",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },methods:{
        save:function(){ 
            this.content = this.$refs.editor.getContent();
        },confirm:function(){
            this.save();
            this.$refs.content.value=this.content;
            this.$refs.submit_confirm.open();
        },submitForm:function(){
            this.$refs.post_form.submit();
        }
    }
}
</script>
<style scope>
.raw{
    height:500pt;
}
</style>

