<template>
<div>
<v-container>

    <v-card>

        <v-card-title class="display-1">Create post</v-card-title>

        <v-card-text>
            <p v-html="response"></p>

            <form v-if="update" action="/post/update" method="post" ref='update_form'>
                <v-layout  class="ma-3">

                    <input type='hidden' name="post_id" :value="post._id"/>
                    
                    <v-flex md4>
        
                        <v-text-field name='title'
                            label="Title"
                            placeholder="My awesome blog"
                            :value="post.title"
                        >
                        </v-text-field>

                    </v-flex>

                    <v-spacer></v-spacer>

                    <v-flex md2>
                        <v-btn @click="confirm" class="green" dark large>
                            Change 
                            <v-icon class="ml-1">update</v-icon>
                        </v-btn>
                    </v-flex>

                    <confirm @confirmed="submitForm" ref="submit_confirm">
                        <div slot="content">
                            Are you sure you want to update this post?
                        </div>
                    </confirm>

                </v-layout>

                <input type="hidden" name="_token" :value="csrf" />

                <input type="hidden" value="" name='content' ref='content'/>

                <slot name='content'></slot>
            </form>
            
            <form v-else action="/store-post" method="post" ref='post_form'>
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

                <slot name='content'></slot>
            </form>
                <Vueditor ref="editor" class="ma-3 raw" ></Vueditor>
        </v-card-text>
    </v-card>
</v-container> 

</div>

</template>



<script>
export default {
    props:{
        update:{
            default:false,
            type:Boolean
        },
        response:{
            default:'',
            type:String
        },
        post:{
            default:function(){
            return{};
            },
            type:Object
        },
    },
    data(){
        return{
            title:"",
            content:"",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },methods:{
        passToVueditor:function(){
            this.$refs.editor.setContent(this.post.content);
        }
        ,save:function(){ 
            this.content = this.$refs.editor.getContent();
        },confirm:function(){
            this.save();
            this.$refs.content.value=this.content;
            this.$refs.submit_confirm.open();
        },submitForm:function(){
            if(this.update){
                this.$refs.update_form.submit();
            }else{
                this.$refs.post_form.submit();
            }
            
        }
    },
    mounted(){
        this.passToVueditor();
    }
}
</script>
<style scope>
.raw{
    height:500pt;
}
</style>

