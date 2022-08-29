<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
// 1Ra forma de escuchar

 /*    protected $listeners = ['eliminarVacante'];
   
    public function prueba($vacante_id)
    {
        dd($vacante_id);
    }
 */

   protected $listeners = ['eliminarVacante'];

    public function eliminarVacante(Vacante $vacante)
    {
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(10);
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
