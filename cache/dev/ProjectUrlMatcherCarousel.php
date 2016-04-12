<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * ProjectUrlMatcherCarousel.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class ProjectUrlMatcherCarousel extends Symfony\Component\Routing\Matcher\UrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/admin/module/carousel')) {
            if (0 === strpos($pathinfo, '/admin/module/carousel/up')) {
                // carousel.upload.image
                if ($pathinfo === '/admin/module/carousel/upload') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_carouseluploadimage;
                    }

                    return array (  '_controller' => 'Carousel\\Controller\\ConfigurationController::uploadImage',  '_route' => 'carousel.upload.image',);
                }
                not_carouseluploadimage:

                // carousel.update
                if ($pathinfo === '/admin/module/carousel/update') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_carouselupdate;
                    }

                    return array (  '_controller' => 'Carousel\\Controller\\ConfigurationController::updateAction',  '_route' => 'carousel.update',);
                }
                not_carouselupdate:

            }

            // carousel.delete
            if ($pathinfo === '/admin/module/carousel/delete') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_carouseldelete;
                }

                return array (  '_controller' => 'Carousel\\Controller\\ConfigurationController::deleteAction',  '_route' => 'carousel.delete',);
            }
            not_carouseldelete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
