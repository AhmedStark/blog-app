<template>
    <v-container>
    <v-layout>
    <v-flex md6 offset-md3 xs12>
    <v-card>
        <v-card-title class="display-1" >Login</v-card-title>
        <v-card-text>
            <v-form id="login-form" action="/login" method="post">
                <v-text-field
                name="email"
                label="Login-ID"
                required
                class="mx-4"
                >
                </v-text-field>
                <input type="hidden" name="_token" :value="csrf" />
                <v-text-field
                name="password"
                type="password" 
                label="Password"
                required
                class="mx-4"
                ></v-text-field>
                <p v-html="response"></p>
                <v-btn form="login-form" color="green" dark type="submit" class="mx-4">Login</v-btn>

                <slot name="content">

                </slot>
            </v-form>
        </v-card-text>
    </v-card>    
    </v-flex>
    </v-layout>
    </v-container>
</template>

<script>
    export default {
        props:{
            response:{
                default:"",
                type:String,
            }
        },
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

            }
        },
        mounted() {
        }
    }
</script>
