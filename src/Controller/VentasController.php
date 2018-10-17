<?php

namespace App\Controller;

use App\Entity\TClientes;
use App\Entity\TPrendas;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\TVentas;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Form\TVentasType;

/**
 * @Route("/tienda")
 */

class VentasController extends FOSRestController
{
	/**
	 * @Route("/ventas/new", name="add", methods={"POST"})
     */
    public function addAction( Request $request ): ? Response
    {
        $ventas = new TVentas();
        $form   = $this->createForm( TVentasType::class, $ventas );
        $form->handleRequest( $request );

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist( $ventas );
            $em->flush();

            return new JsonResponse([
                'success' => 'OK',
                'msg'     => 'Venta registrada'
            ]);
        }

        throw new HttpException(400, "Invalid data");
    }

    /**
     * @Route("/ventas/{id}", name="get", methods={"GET"})
     */
    public function getAction( int $id ):array //?Object//array //Response
    {
        $result = array();

        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $em      = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository(TClientes::class)->find( $id );

        $ventas = $em->getRepository(TVentas::class)->findBy(
            array( "idTCliente" => $id )
        );

        if ( !$cliente || !$ventas ) {
            throw new HttpException(400, "Invalid data");
        }
        /**/
        for( $i=0; $i < count( $ventas ); $i++ ){
            $prenda = $em->getRepository(TPrendas::class)->find( $ventas[$i]->getIdTPrenda() );

            $result[$i]["id_t_cliente"]    = $cliente->getIdTCliente();
            $result[$i]["nombre"]          = $cliente->getNombre();
            $result[$i]["paterno"]         = $cliente->getPaterno();
            $result[$i]["materno"]         = $cliente->getMaterno();
            $result[$i]["prenda"]          = $prenda->getTipoDePrenda();
            $result[$i]["precio"]          = $prenda->getPrecio();
            $result[$i]["credito interno"] = $cliente->getCreditoInterno();
            $result[$i]["total venta"]     = $ventas[$i]->getTotalVenta();

            $fecha                         = $ventas[$i]->getFechaRegistro()->format('d/m/Y');
            $result[$i]["fecha"]           = $fecha;
        }

        return $result;
    }

    /**
     * @Route("/ventas/update", name="update", methods={"PUT"})
     */
    public function updateAction( Request $request ): ? Response
    {
        $id         = $request->get("idTVentas");
        $idTCliente = $request->get("idTCliente");
        $idTPrenda  = $request->get("idTPrenda");
        $credito    = $request->get("creditoInternosado");
        $total      = $request->get("totalVenta");

        if ( $id === null || $id === "" ) {
            $ventas = new TVentas();
            $ventas->setIdTCliente( $idTCliente );
            $ventas->setIdTPrenda( $idTPrenda );
            $ventas->setFechaRegistro( new \DateTime('now') );
            $ventas->setCreditoInternoUsado( $credito );
            $ventas->setTotalVenta( $total );

            $em = $this->getDoctrine()->getManager();
            $em->persist( $ventas );
            $em->flush();

            return new JsonResponse([
                'success' => 'OK',
                'msg'     => 'Venta actualizada'
            ]);
        }else{
            $em     = $this->getDoctrine()->getManager();
            $ventas = $em->getRepository(TVentas::class)->find($id);

            $ventas->setIdTCliente( $idTCliente );
            $ventas->setIdTPrenda( $idTPrenda );
            $ventas->setFechaRegistro( new \DateTime('now') );
            $ventas->setCreditoInternoUsado( $credito );
            $ventas->setTotalVenta( $total );

            $em->persist( $ventas );
            $em->flush();

            return new JsonResponse([
                'success' => 'OK',
                'msg'     => 'Venta actualizada'
            ]);
        }
        throw new HttpException(400, "Invalid data");

    }

    /**
     * @Route("/ventas/delete/{id}", name="delete", methods={"DELETE"})
     */
    public function deleteAction( int $id ):? Response
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }
        $em     = $this->getDoctrine()->getManager();
        $ventas = $em->getRepository(TVentas::class)->find($id);

        if ( $ventas ){
            $credito = $ventas->getCreditoInternoUsado();
            if ( $credito > 0 ){
                $id_cliente      = $ventas->getIdTCliente();
                $cliente         = $em->getRepository(TClientes::class)->find( $id_cliente );
                $credito_cliente = $cliente->getCreditoInterno();
                $cliente->setCreditoInterno( $credito_cliente + $credito );
                $em->persist( $cliente );
            }

            $em->remove( $ventas );
            $em->flush();
        }else{
            throw new HttpException(400, "Invalid id");

        }

        return new JsonResponse([
            'success' => 'OK',
            'msg'     => 'Venta eliminada'
        ]);
    }
}
