<template>
    <v-container>
    <v-layout>
    <v-flex md6 offset-md3 xs12>
    <v-card>
        <v-card-title class="display-1" >Sign up</v-card-title>
        <v-card-text>
            <v-form id="signup-form" action="/signup" method="post">
                <v-text-field
                name="email"
                label="Email"
                required
                class="mx-4"
                >
                </v-text-field>

                <v-text-field
                name="name"
                label="Name"
                required
                class="mx-4"
                >
                </v-text-field>

                <input type="hidden" name="_token" :value="csrf" />
                
                <v-text-field
                name="pwd"
                type="password" 
                label="Password"
                required
                class="mx-4"
                ></v-text-field>
                
                <v-text-field
                name="rpwd"
                type="password" 
                label="Repeat password"
                required
                class="mx-4"
                ></v-text-field>

                <p v-html="response"></p>
                <v-btn form="signup-form" color="green" dark type="submit" class="mx-4">sign up!</v-btn>

                <slot name='content'></slot>
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
