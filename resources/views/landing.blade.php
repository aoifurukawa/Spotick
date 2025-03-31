@extends('layouts.app')

@section('title', 'Spotick')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Oregano:ital@0;1&display=swap');
    
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

     .landing-body{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        overflow: hidden;
    }

    .contain {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }

     h2{
        color: black;
        font-size: 16rem;
        text-align: center;
        position: relative;
        font-family:  "Oregano", cursive;
        z-index: 2;
    }

    .block{
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: rgba(0, 255, 255, 0.37);
        box-shadow: 10px 10px 50px rgba(0, 0, 0, 0.2);
    }

    .block2{
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color:   #dba2f375;
        box-shadow: 10px 10px 50px rgba(0, 0, 0, 0.2);
    }

    .block3{
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color:   #f2c09f70;
        box-shadow: 10px 10px 50px rgba(0, 0, 0, 0.2);
    }



</style>
<div class='landing-body' style="position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        overflow: hidden;">
    <div class="contain" style="">
        <h2>Spotick</h2>
    </div>

    <script src="{{ asset('js/anime.min.js') }}"></script>
    <script>
        const contain = document.querySelector('.contain');
        for(var i=0; i<=18; i++){
            const blocks = document.createElement('div');
            blocks.classList.add('block');
            contain.appendChild(blocks);
        }
        function animateBloks(){
            anime({
                targets: ".block",
                translateX: function(){
                    return anime.random(-800, 700)
                },

                translateY: function(){
                    return anime.random(-500, 500)
                },

                scale: function(){
                    return anime.random(1, 3);
                },
                
                duration: 4000,
                delay: anime.stagger(30),
                complete: animateBloks
            });
        }

        animateBloks();

        const contain2 = document.querySelector('.contain');
        for(var i=0; i<=10; i++){
            const blocks = document.createElement('div');
            blocks.classList.add('block2');
            contain2.appendChild(blocks);
        }
        function animateBloks2(){
            anime({
                targets: ".block2",
                translateX: function(){
                    return anime.random(-800, 700)
                },

                translateY: function(){
                    return anime.random(-500, 500)
                },

                scale: function(){
                    return anime.random(1, 3);
                },
                
                duration: 4000,
                delay: anime.stagger(30),
                complete: animateBloks2
            });
        }

        animateBloks2();

        const contain3 = document.querySelector('.contain');
        for(var i=0; i<=8; i++){
            const blocks = document.createElement('div');
            blocks.classList.add('block3');
            contain3.appendChild(blocks);
        }
        function animateBloks3(){
            anime({
                targets: ".block3",
                translateX: function(){
                    return anime.random(-800, 700)
                },

                translateY: function(){
                    return anime.random(-500, 500)
                },

                scale: function(){
                    return anime.random(1, 3);
                },
                
                duration: 4000,
                delay: anime.stagger(30),
                complete: animateBloks3
            });
        }

        animateBloks3();
    </script>
</div>
@endsection

