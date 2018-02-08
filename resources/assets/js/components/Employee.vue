<template>
        <tile :position="position" v-bind:class="user.classed">
            <section class="employee">
                <h1 class="employee__title">{{ employee }}</h1>
            </section>
        </tile>

</template>

<script>
import echo from '../mixins/echo';
import Tile from './atoms/Tile';
import axios from 'axios';

export default{

    components: {
        Tile
    },

    mixins : [echo],

    props : ['employee','position','email','user'],

    data(){
        return {
            user : {
                classed : 'online'
            }
        }
    },

    methods : {

        getStatus : function(email){

            axios.get('/users/' + email + '/status').then((response) => {
                this.user = response.data;
                this.getStatusClass(this.user);
            },(response) => {
                this.user = {}
            })

        },


        getStatusClass : function(user){
            this.user.classed = 'employee__' + user.status_bool != undefined && user.status_bool == true ? 'online' : 'offline';
        }

    },


    mounted() {
    }



};

</script>