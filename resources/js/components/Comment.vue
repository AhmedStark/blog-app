<template>
    <div>
        <div >

            <div class="comment-head title">
                {{userName}}
            </div>

            <div class="comment-head grey--text text--darken-1">
                {{new Date(createdAt).toLocaleDateString("en-nz")}}
            </div>
            
        </div>
    
        <p class="body-1">{{comment}}</p>

    </div>
</template>
<script>
export default {
    props:{
        userName:{
            default:'',
            type:String
        },createdAt:{
            default:'',
            type:String
        },
        comment:{
            default:'',
            type:String
        }
    }
}
</script>
<style scoped>
.comment-head{
    display: inline;
}
</style>
