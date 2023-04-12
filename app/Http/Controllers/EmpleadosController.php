<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empleados;
use App\Models\roles;
use App\Models\nominas;

class EmpleadosController extends Controller
{
    public function bootstrap() {
        return view('vistabootstrap');
    }

    public function listar_empleados(){
        $consulta = empleados::withTrashed()->join('roles','empleados.id_tipo_empleado', '=', 'roles.id')
                            ->select('empleados.id',
                                     'empleados.nombre',
                                     'empleados.ap_pat',
                                     'empleados.ap_mat',
                                     'roles.nombre as role',
                                     'empleados.email',
                                     'empleados.deleted_at',
                                     'empleados.imagen')
                            ->orderBy('empleados.nombre')
                            ->get();

        return view('listarempleados')
                ->with('consulta', $consulta);
    }

    public function alta_empleado(){
        $idEmpleado = empleados::withTrashed()->orderBy('id', 'DESC')
                                ->take(1)->get();
        $id = $idEmpleado[0]->id;

        if($id == 0){
            $nuevoId = 1;
        } else {
            $nuevoId = $id + 1;
        }
        
        $consultaRoles = roles::orderBy('nombre')->get(['id','nombre']);
        
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
            'pass'            => 'required',
            'foto_perfil'     => 'image|mimes:gif,jpeg,png'
        ]);

        // Recibir el archivo subido
        $archivo = $request->file('foto_perfil');
        $filename  = null;

        if($archivo){
            // Generate a unique filename for the uploaded file
            $filename = uniqid() . '.' .$archivo->getClientOriginalExtension();
        
            // Store the uploaded file in the public/archivos directory
            $archivo->move(public_path('archivos'), $filename);
        }


        // Creacion del empleado
        $empleados = new empleados;
        $empleados->nombre           = $request->nombre;
        $empleados->ap_pat           = $request->ap_pat;
        $empleados->ap_mat           = $request->ap_mat;
        $empleados->direccion        = $request->direccion;
        $empleados->numero_telefono  = $request->numero_telefono;
        $empleados->id_tipo_empleado = $request->tipo_empleado;
        $empleados->genero           = $request->genero;
        $empleados->email            = $request->email;
        $empleados->password         = $request->pass;
        $empleados->imagen           = $filename;


        $empleados->save();

        // $proceso = "Alta Empleado";
        // $mensaje = "Empleado ($request->nombre $request->ap_pat $request->ap_mat) guardado Correctamente";

        // return view('vistaempleado')
        //         ->with('proceso',$proceso)
        //         ->with('mensaje',$mensaje)
        //         ->with('error', 0);
        
        return redirect()->route('listar_empleados')->with('success', "Empleado ($request->nombre $request->ap_pat $request->ap_mat) guardado Correctamente");
    }

    public function modificar_empleado($id_empleado){
        $consultaRoles = roles::orderBy('nombre')
                                ->get(['id','nombre']);

        $consultaEmpleado = empleados::withTrashed()->join('roles','empleados.id_tipo_empleado', '=', 'roles.id')
                                        ->select('empleados.id',
                                                'empleados.nombre',
                                                'empleados.ap_pat',
                                                'empleados.ap_mat',
                                                'empleados.direccion',
                                                'empleados.numero_telefono',
                                                'empleados.id_tipo_empleado',
                                                'empleados.genero',
                                                'roles.nombre as role',
                                                'empleados.email',
                                                'empleados.password')
                                        ->where('empleados.id', $id_empleado)
                                        ->get();

        $dataEmpleado = $consultaEmpleado[0];

        return  view('modificarempleado')
                ->with('consultaRoles', $consultaRoles)
                ->with('dataEmpleado', $dataEmpleado);
    }

    public function actualizar_empleado(Request $request){
        $this->validate($request,[
            'id_empleado'     => 'required|numeric',
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

        $empleados = empleados::withTrashed()->find($request->id_empleado);
        $empleados->nombre           = $request->nombre;
        $empleados->ap_pat           = $request->ap_pat;
        $empleados->ap_mat           = $request->ap_mat;
        $empleados->direccion        = $request->direccion;
        $empleados->numero_telefono  = $request->numero_telefono;
        $empleados->id_tipo_empleado = $request->tipo_empleado;
        $empleados->genero           = $request->genero;
        $empleados->email            = $request->email;
        $empleados->password         = $request->pass;

        $empleados->save();

        // $proceso = "Modificar Empleado";
        // $mensaje = "Empleado Modificado Correctamente";

        // return view('vistaempleado')
        //         ->with('proceso',$proceso)
        //         ->with('mensaje',$mensaje)
        //         ->with('error', 0);
        return redirect()->route('listar_empleados')->with('success', "Empleado ($request->nombre $request->ap_pat $request->ap_mat) Modificado Correctamente");
    }

    public function desactivar_empleado($id_empleado){
        $empleados = empleados::find($id_empleado);
        $empleados->delete();

        // $proceso = "Desactivar Empleado";
        // $mensaje = "Empleado Desactivado Correctamente";

        // return view('vistaempleado')
        //         ->with('proceso',$proceso)
        //         ->with('mensaje',$mensaje)
        //         ->with('error', 0);
        return redirect()->route('listar_empleados')->with('warning', "Empleado Desactivado Correctamente");
    }

    public function activar_empleado($id_empleado){
        empleados::withTrashed()
                    ->where('id',$id_empleado)
                    ->restore();

        // $proceso = "Activar Empleado";
        // $mensaje = "Empleado Activado Correctamente";

        // return view('vistaempleado')
        //         ->with('proceso',$proceso)
        //         ->with('mensaje',$mensaje)
        //         ->with('error', 0);        
        return redirect()->route('listar_empleados')->with('success', "Empleado Activado Correctamente");
    }

    public function borrar_empleado($id_empleado){
        $consultaNomina = nominas::where('id_empleado','=',$id_empleado)->get();
        $numeroRegistros = count($consultaNomina);

        if($numeroRegistros == 0){
            empleados::withTrashed()
                    ->find($id_empleado)
                    ->forceDelete();

            // $proceso = "Borrar Empleado";
            // $mensaje = "Empleado Borrado Correctamente";

            // return view('vistaempleado')
            //         ->with('proceso',$proceso)
            //         ->with('mensaje',$mensaje)
            //         ->with('error', 0);
            return redirect()->route('listar_empleados')->with('success', "Empleado Borrado Correctamente");
        } else {
            // $proceso = "Borrar Empleado";
            // $mensaje = "No ha sido posible Borrar el empleado";

            // return view('vistaempleado')
            //         ->with('proceso',$proceso)
            //         ->with('mensaje',$mensaje)
            //         ->with('error', 1);
            return redirect()->route('listar_empleados')->with('warning', "No ha sido posible Borrar el empleado ya que cuenta con registros de Nomina");
        }
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
