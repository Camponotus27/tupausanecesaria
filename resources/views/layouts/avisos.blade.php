<style>
    .avisos {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .aviso-item {
        display: inline-block;
        padding: var(--ts);
    }

    .aviso-item img {
        width: calc(var(--txxl) * 2);
        height: auto;
    }    
</style>

<div class="avisos">
    <div class="aviso-item">
        <img src="{{asset('img/Iconos/no_fumar.png')}}" alt="No fumar">
    </div>
    <div class="aviso-item">
        <img src="{{asset('img/Iconos/prohibido_baños.png')}}" alt="Prohibido baños">
    </div>
</div>