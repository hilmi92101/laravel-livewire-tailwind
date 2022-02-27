<template>  
    <div class="flex flex-col min-h-screen justify-between">
        <AppHeader></AppHeader>
        <main class="flex flex-grow bg-blue-100">
            <router-view></router-view>
        </main>
        <AppFooter></AppFooter>
    </div>
</template>  
<script>  

    import AppHeader from './partials/Header';
    import AppFooter from './partials/Footer';

    export default {  
        components: { 
            AppHeader, 
            AppFooter, 
            
        },  
        props: {  
        }, 
    	data() {  
            return {  
                  
            }  
        },   
        created() {  
        },  
    	methods: {  
             
        },  
        computed: {  
        },  
        filters: {  
             
        }  
          
    }  
</script>