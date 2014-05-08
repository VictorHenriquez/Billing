<?php
namespace App\ApiBundle\Controller;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response,
    Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\View\RouteRedirectView,
    FOS\RestBundle\View\View,
    FOS\RestBundle\Controller\Annotations\QueryParam,
    FOS\RestBundle\Controller\Annotations\Put,
    FOS\RestBundle\Controller\Annotations\Delete,
    FOS\RestBundle\Request\ParamFetcherInterface;

use App\ApiBundle\ApiResponse;

use App\ClientBundle\Entity;

class InvoiceController extends Controller
{
    /**
     * Get the list of invoices
     *
     * @param ParamFetcher $paramFetcher
     * @param string $page integer with the page number (requires param_fetcher_listener: force)
     * @return array data
     *
     * @QueryParam(name="page", requirements="\d+", default="1", description="Page of the overview.")
     */
    public function getInvoicesAction(ParamFetcherInterface $paramFetcher)
    {
        $page = $paramFetcher->get('page');
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select(array('p'))
            ->from('AppClientBundle:ClientInvoice', 'p')
        ;

        $data = new ApiResponse($this, $query, $page);
        $view = new View($data);
        return $this->get('fos_rest.view_handler')->handle($view);
    }

    /**
     * Get the article
     *
     * @param string $article path
     * @return View view instance
     *
     */
    public function getInvoiceAction($article, Request $request)
    {
        $query = explode('/', $request->getUri());
        $id = end($query);
        $data = $this->getDoctrine()->getRepository('AppClientBundle:ClientInvoice')->findOneBy(['id' => $id]);

        // using explicit View creation
        $view = new View($data);

        return $this->get('fos_rest.view_handler')->handle($view);
    }

    protected function getForm($article = null)
    {
        return $this->createForm(new \App\ClientBundle\Form\ClientInvoiceType(), $article);
    }

    /**
     * Create a new resource
     *
     * @param Request $request
     * @return View view instance
     *
     */
    public function postInvoicesAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->getForm();

        $data = json_decode($request->getContent());

        // Set default status to active
        //if(!isset($data->status)) $data->status = 1;

        // Set all other data as per REST
        foreach($data as $key => $value) $bind[$key] = $value;
        $form->bind($bind);

        if ($form->isValid()) {
            $article = $form->getData();

            $em->persist($article);
            $em->flush();
            // Note: normally one would likely create/update something in the database
            // and/or send an email and finally redirect to the newly created or updated resource url
            $response = ['id' => $article->getId()];
            $view = new View($response);
        } else {
            $view = View::create($form);
        }

        return $this->get('fos_rest.view_handler')->handle($view);
    }

    /**
     * Edit a invoice
     * @Put("/invoices/{id}")
     */
    public function putInvoicesAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $data = json_decode($request->getContent());

        // Set initial data as per database
        $initial = $this->getDoctrine()->getRepository('AppClientBundle:ClientInvoice')->findOneBy(['id' => $id]);
        if(!is_null($initial))
        {
            $form = $this->getForm($initial);

            // Set all other data as per REST
            foreach($data as $key => $value) $bind[$key] = $value;
            $form->bind($bind);

            if ($form->isValid()) {
                $article = $form->getData();

                $em->persist($article);
                $em->flush();
                // Note: normally one would likely create/update something in the database
                // and/or send an email and finally redirect to the newly created or updated resource url
                $response = ["status" => "Success"];
                $view = new View($response);
            } else {
                $view = View::create($form);
            }
        }
        else
        {
            $response = ["status" => "Not found"];
            $view = new View($response);
        }

        return $this->get('fos_rest.view_handler')->handle($view);
    }

    /**
     * Delete a invoice
     * @Delete("/invoices/{id}")
     */
    public function deleteInvoiceAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $invoice = $this->getDoctrine()->getRepository('AppClientBundle:ClientInvoice')->findOneBy(['id' => $id]);

        if(!is_null($invoice))
        {
            $em->remove($invoice);
            $em->flush();
            $response = ["status" => "Success"];
        }
        else
        {
            $response = ["status" => "Not found"];
        }
        $view = new View($response);

        return $this->get('fos_rest.view_handler')->handle($view);
    }
}