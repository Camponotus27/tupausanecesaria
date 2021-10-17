<style>

    #home-menu-button{
        height: 100%;
        position: relative;
        width: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    #home-menu-button > div{
        font-size: 4.5em;
        font-weight: 500;
        position: relative;
        background: rgba(0,0,0,0.1);
        margin-bottom: 20vh;
        font-family: 'Santiago-Pro';
    }

    #home-menu-button > div > a{
        color: white;
        padding: 5px 30px;
        animation: animateneon 5s infinite;
        box-shadow: 0 0 1px white;
    }

    #home-menu-button > div > a:hover{
        background: rgba(255,255,255,.2);
    }

    @media screen and (min-width: 768px) {
        #home-menu-button{
            display: none;
        }
    }

    @keyframes animateneon {
        50% { box-shadow: 0 0 5px white, 0 0 10px white, 0 0 20px white; }
    }
    
</style>

<div id="home-menu-button">
    <div>
        <a href="{{ route('menu.index') }}" class="menu-link" >Ver Carta</a>
    </div>
</div>