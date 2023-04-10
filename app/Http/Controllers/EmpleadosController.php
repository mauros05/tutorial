<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empleados;
use App\Models\roles;

class EmpleadosController extends Controller
{
    public function bootstrap() {
        return view('vistabootstrap');
    }

    public function alta_empleado(){
        $idEmpleado = empleados::orderBy('id', 'DESC')
                                ->take(1)->get();
        $id = $idEmpleado[0]->id;

        if($id == 0){
            $nuevoId = 1;
        } else {
            $nuevoId = $id + 1;
        }
        
        $consultaRoles = roles::get(['id','nombre']);
        
        return view('altaempleado')
                ->with('consultaRoles',$consultaRoles)
                ->with('nuevoId', $nuevoId);
    }

    public function guardar_empleado(Request $request){
        
        // Validaciones:
        $this->validate($request,[
            'nombre'          => 'required|regex:/^[A-Z][A-Z,a-z, ]+$/',
            'ap_pat'          => 'required|alpha',
            'ap_mat'          => 'required|alpha',
            'direccion'       => 'required',
            'numero_telefono' => 'required|numeric|regex:/^[0-9]{10}$/',
            'tipo_empleado'   => 'required|numeric',
            'genero'          => 'required',
            'email'           => 'required|email',
            'pass'            => 'required'
        ]);

        echo "Todo Correcto";
    }

    
    public function eloquent(){
        // CONSULTAR TODOS LOS DATOS DE LA TABLA
        // $consulta = empleados::all();
        // return $consulta;

        // ACCEDER A REGISTROS AUNQUE ESTEN ELIMINADOS
        // $consulta = empleados::withTrashed()->get();
        // return $consulta;

        // ACCEDER SOLO A LOS REGISTROS ELIMINADOS
        // $consulta = empleados::onlyTrashed()->get();
        // return $consulta;
        
        // RESTAURAR UN REGISTRO
        // empleados::withTrashed()->where('id',1)->restore();
        // echo "Restauracion Realizada";

        // ELIMINAR COMPLERTAMENTE EL REGISTRO CON SOFTDELETE
        // $empleados = empleados::find(1)->forceDelete();

        // INSERTAR DATOS EN TABLA 1
        // $empleados = new empleados;
        // $empleados->nombre = 'Julio';
        // $empleados->ap_pat = 'Gutierrez';
        // $empleados->ap_mat = 'Blanco';
        // $empleados->direccion = 'Galeana 100 Norte';
        // $empleados->numero_telefono = 9211369625;
        // $empleados->id_tipo_empleado = 1;
        // $empleados->genero = 'M';
        // $empleados->email = 'juliom@hotmail.com';
        // $empleados->password = '123456';

        // $empleados->save();


        // INSERTAR DATOS EN TABLA 2
        // $empleados = empleados::create([
        //     'nombre' => 'Rosa',
        //     'ap_pat' => 'Marquez',
        //     'ap_mat' => 'Cartagena',
        //     'direccion' => 'Av Uno, 1225',
        //     'numero_telefono' => 9211038856,
        //     'id_tipo_empleado' => 2,
        //     'genero' => 'F',
        //     'email' => 'rosa@gmail.com',
        //     'password' => '123456',
        //     'edad' => 18,
        //     'salario' => 20000
        // ]);
        // return "Operacion realizada";

        // MODIFICAR DATOS
        // Forma 1
        // $empleados = empleados::find(2);
        // $empleados->nombre = "Julio Mauricio";

        // $empleados->save();
        // return "Modificacion realizada";

        // Forma 2
        // empleados::where('genero', 'M')
        // ->where('email', 'juliom@hotmail.com')
        // ->update(['nombre' => 'Mauricio',
        //           'ap_pat' => 'Garcez']);
        
        // return "Modificacion realizada";

        // ELIMINAR DATOS
        // empleados::destroy(2);

        // $empleados = empleados::find(2);
        // $empleados->delete();
            
        // $empleados = empleados::find(1);
        // $empleados->delete();


        // return "Eliminacion realizada";

        // CONSULTAS CON CONDICIONES
        // $consulta = empleados::all();

        // $consulta = empleados::where('genero', 'M')->get();

        // $consulta = empleados::where('edad','>=',17)
        //                      ->where('edad','<=', 30)
        //                      ->get();

        // $consulta = empleados::whereBetween('edad',[17,30])->get();
        
        // $consulta = empleados::whereIn('id',[1,2,3])
        //                      ->orderBy('nombre','desc') 
        //                      ->get();

        // $consulta = empleados::where('edad','>=',17)
        //                      ->where('edad','<=', 60)
        //                      ->take(3)
        //                      ->get();

        // $consulta = empleados::select(['nombre','ap_pat','edad'])
        //                      ->where('edad','>=', 19)
        //                      ->get();

        // $consulta = empleados::select(['nombre','ap_pat','edad'])
        //                      ->where('ap_pat','LIKE', '%rre%')
        //                      ->get();

        // $consulta = empleados::where('genero','F')
        //                      ->sum('salario');

        // $consulta = empleados::groupBy('genero')
        //             ->selectRaw('genero, sum(salario) as salariototal')
        //             ->get();

        // $consulta = empleados::groupBy('genero')
        //             ->selectRaw('genero, count(*) as cuantos')
        //             ->get();

        // $consulta = empleados::join('roles','empleados.id_tipo_empleado', '=', 'roles.id')
        //             ->select('empleados.id','empleados.nombre','roles.nombre as role','empleados.edad')
        //             ->where('empleados.edad','>=',20)
        //             ->get();

        // $cuantos = count($consulta);


        // $consulta = empleados::where('edad','>=',70)
        //                      ->orwhere('genero','F')
        //                      ->get();
        
        // return $consulta;
    }
}
