(function($) {
    // Esta función solo es responsable de la función de una imagen de carrusel cada vez que se llama
    // Es decir, solo se generará un carrusel, y el alcance de esta función solo se puede asignar a un carrusel
    // Se requiere pasar la etiqueta raíz del carrusel actual al llamar a esta función
    // El parámetro formal ele aquí es la etiqueta raíz de un carrusel
    var slide = function(ele,options) {
        var $ele = $(ele);
        // opciones de configuración predeterminadas
        var setting = {
        		// Controlar el tiempo de animación del carrusel
            speed: 500,
            // Controlar el tiempo de intervalo (velocidad de rotación)
            interval: 1000,
        };
        // fusión de objetos con las opciones
        $.extend(true, setting, options);
        // Especifica la posición y el estado de cada imagen.
        var states = [
            { $zIndex: 1, width: 120, height: 150, top: 69, left: 134, $opacity: 0.2 },
            { $zIndex: 2, width: 130, height: 170, top: 59, left: 0, $opacity: 0.4 },
            { $zIndex: 3, width: 170, height: 218, top: 35, left: 110, $opacity: 0.7 },
            { $zIndex: 4, width: 224, height: 288, top: 0, left: 263, $opacity: 1 },
            { $zIndex: 3, width: 170, height: 218, top: 35, left: 470, $opacity: 0.7 },
            { $zIndex: 2, width: 130, height: 170, top: 59, left: 620, $opacity: 0.4 },
            { $zIndex: 1, width: 120, height: 150, top: 69, left: 500, $opacity: 0.2 }
        ];

        var $lis = $ele.find('li');
        var timer = null;

        // eventos
        $ele.find('.hi-next').on('click', function() {
            next();
        });
        $ele.find('.hi-prev').on('click', function() {
            states.push(states.shift());
            move();
        });
        $ele.on('mouseenter', function() {
            clearInterval(timer);
            timer = null;
        }).on('mouseleave', function() {
            autoPlay();
        });

        move();
        autoPlay();

        // Que cada li corresponda a cada estado de los estados anteriores
        // Deja que li se expanda desde el medio

        function move() {
            $lis.each(function(index, element) {
                var state = states[index];
                $(element).css('zIndex', state.$zIndex).finish().animate(state, setting.speed).find('img').css('opacity', state.$opacity);
            });
        }

        // cambiar al siguiente
        function next() {
            // Principio: Mover el último elemento de la matriz al primero
            states.unshift(states.pop());
            move();
        }

        function autoPlay() {
            timer = setInterval(next, setting.interval);
        }
    }
    // Encuentre la etiqueta raíz del carrusel que se rotará y llame a slide()
    $.fn.hiSlide = function(options) {
        $(this).each(function(index, ele) {
            slide(ele,options);
        });
        // valor devuelto para admitir llamadas encadenadas
        return this;
    }
})(jQuery);
