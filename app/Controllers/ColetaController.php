<?php

namespace FacaOBem\Controllers;

use FacaOBem\Helpers\Session;
use FacaOBem\Models\Coleta;

class ColetaController
{
    public static function index()
    {
        require './app/Views/coleta.html';
    }

    public static function create($post)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $coleta = new Coleta();
                $coleta->fill($post);
                $coleta->setAttribute('idUsuario', Session::get('idUsuario'));
                $coleta->setAttribute('situacao', 1);
                $coleta->save();
                echo json_encode(array('status' => true, 'msg' => ''));
            } catch (\Exception $e) {
                echo json_encode(array('status' => false, 'msg' => 'Erro ao salvar solicitação de coleta'));
            }
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Erro ao solicitar coleta'));
        }
    }

    public static function read()
    {
        echo json_encode(Coleta::buscarIdUsuario(Session::get('idUsuario')));
    }

    public static function delete($id)
    {
        try {
            $coleta = Coleta::find((int)$id);
            $coleta->delete();
            echo json_encode(array('status' => true, 'msg' => ''));

        } catch (\Exception $e) {
            echo json_encode(array('status' => false, 'msg' => 'Erro ao excluir solicitação de coleta'));
        }
    }

    public static function buscar($id)
    {
        $coleta = Coleta::find((int)$id);
        echo json_encode($coleta);
    }

    public static function update($post, $id)
    {
        $postN = [];
        $coleta = Coleta::find((int)$id);
        $postN['descricao'] = $post['descricao-edicao'];
        $postN['data1'] = $post['data1-edicao'];
        $postN['data2'] = $post['data2-edicao'];
        $postN['turno1'] = $post['turno1-edicao'];
        $postN['turno2'] = $post['turno2-edicao'];
        $coleta->fill($postN);
        $coleta->save();
        echo json_encode(array('status' => true, 'msg' => ''));
    }
}
