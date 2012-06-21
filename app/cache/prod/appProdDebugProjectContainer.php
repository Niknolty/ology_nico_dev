<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * appProdDebugProjectContainer
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class appProdDebugProjectContainer extends Container
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();

        $this->set('service_container', $this);

        $this->scopes = array('request' => 'container');
        $this->scopeChildren = array('request' => array());
    }

    /**
     * Gets the 'annotation_reader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Doctrine\Common\Annotations\FileCacheReader A Doctrine\Common\Annotations\FileCacheReader instance.
     */
    protected function getAnnotationReaderService()
    {
        return $this->services['annotation_reader'] = new \Doctrine\Common\Annotations\FileCacheReader(new \Doctrine\Common\Annotations\AnnotationReader(), '/var/www/ology4/app/cache/prod/annotations', true);
    }

    /**
     * Gets the 'assetic.asset_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Assetic\Factory\LazyAssetManager A Assetic\Factory\LazyAssetManager instance.
     */
    protected function getAssetic_AssetManagerService()
    {
        $a = $this->get('templating.loader');

        $this->services['assetic.asset_manager'] = $instance = new \Assetic\Factory\LazyAssetManager($this->get('assetic.asset_factory'), array('twig' => new \Assetic\Factory\Loader\CachedFormulaLoader(new \Assetic\Extension\Twig\TwigFormulaLoader($this->get('twig')), new \Assetic\Cache\ConfigCache('/var/www/ology4/app/cache/prod/assetic/config'), true)));

        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FrameworkBundle', '/var/www/ology4/app/Resources/FrameworkBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FrameworkBundle', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SecurityBundle', '/var/www/ology4/app/Resources/SecurityBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SecurityBundle', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'TwigBundle', '/var/www/ology4/app/Resources/TwigBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'TwigBundle', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/TwigBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'MonologBundle', '/var/www/ology4/app/Resources/MonologBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'MonologBundle', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/MonologBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SwiftmailerBundle', '/var/www/ology4/app/Resources/SwiftmailerBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SwiftmailerBundle', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/SwiftmailerBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'DoctrineBundle', '/var/www/ology4/app/Resources/DoctrineBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'DoctrineBundle', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/DoctrineBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'AsseticBundle', '/var/www/ology4/app/Resources/AsseticBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'AsseticBundle', '/var/www/ology4/vendor/bundles/Symfony/Bundle/AsseticBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SensioFrameworkExtraBundle', '/var/www/ology4/app/Resources/SensioFrameworkExtraBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SensioFrameworkExtraBundle', '/var/www/ology4/vendor/bundles/Sensio/Bundle/FrameworkExtraBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSSecurityExtraBundle', '/var/www/ology4/app/Resources/JMSSecurityExtraBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSSecurityExtraBundle', '/var/www/ology4/vendor/bundles/JMS/SecurityExtraBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSAopBundle', '/var/www/ology4/app/Resources/JMSAopBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'JMSAopBundle', '/var/www/ology4/vendor/bundles/JMS/AopBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'OlogySocialBundle', '/var/www/ology4/app/Resources/OlogySocialBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'OlogySocialBundle', '/var/www/ology4/src/Ology/SocialBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'EstrisaTwigImageTagBundle', '/var/www/ology4/app/Resources/EstrisaTwigImageTagBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'EstrisaTwigImageTagBundle', '/var/www/ology4/vendor/Estrisa/Bundle/TwigImageTagBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'KnpZendCacheBundle', '/var/www/ology4/app/Resources/KnpZendCacheBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'KnpZendCacheBundle', '/var/www/ology4/vendor/bundles/Knp/Bundle/ZendCacheBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SncRedisBundle', '/var/www/ology4/app/Resources/SncRedisBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'SncRedisBundle', '/var/www/ology4/vendor/bundles/Snc/RedisBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FOSUserBundle', '/var/www/ology4/app/Resources/FOSUserBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FOSUserBundle', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FOSFacebookBundle', '/var/www/ology4/app/Resources/FOSFacebookBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FOSFacebookBundle', '/var/www/ology4/vendor/bundles/FOS/FacebookBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FOSTwitterBundle', '/var/www/ology4/app/Resources/FOSTwitterBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FOSTwitterBundle', '/var/www/ology4/vendor/bundles/FOS/TwitterBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FOQElasticaBundle', '/var/www/ology4/app/Resources/FOQElasticaBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'FOQElasticaBundle', '/var/www/ology4/vendor/FOQ/ElasticaBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CybernoxAmazonWebServicesBundle', '/var/www/ology4/app/Resources/CybernoxAmazonWebServicesBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CybernoxAmazonWebServicesBundle', '/var/www/ology4/vendor/bundles/Cybernox/AmazonWebServicesBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'OlogyUserBundle', '/var/www/ology4/app/Resources/OlogyUserBundle/views', '/^[^.]+\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'OlogyUserBundle', '/var/www/ology4/src/Ology/UserBundle/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, '', '/var/www/ology4/app/Resources/views', '/^[^.]+\\.[^.]+\\.twig$/'), 'twig');

        return $instance;
    }

    /**
     * Gets the 'assetic.filter.cssrewrite' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Assetic\Filter\CssRewriteFilter A Assetic\Filter\CssRewriteFilter instance.
     */
    protected function getAssetic_Filter_CssrewriteService()
    {
        return $this->services['assetic.filter.cssrewrite'] = new \Assetic\Filter\CssRewriteFilter();
    }

    /**
     * Gets the 'assetic.filter.yui_css' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Assetic\Filter\Yui\CssCompressorFilter A Assetic\Filter\Yui\CssCompressorFilter instance.
     */
    protected function getAssetic_Filter_YuiCssService()
    {
        $this->services['assetic.filter.yui_css'] = $instance = new \Assetic\Filter\Yui\CssCompressorFilter('/usr/share/yui-compressor/yui-compressor.jar', '/usr/bin/java');

        $instance->setCharset('UTF-8');

        return $instance;
    }

    /**
     * Gets the 'assetic.filter_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\AsseticBundle\FilterManager A Symfony\Bundle\AsseticBundle\FilterManager instance.
     */
    protected function getAssetic_FilterManagerService()
    {
        return $this->services['assetic.filter_manager'] = new \Symfony\Bundle\AsseticBundle\FilterManager($this, array('cssrewrite' => 'assetic.filter.cssrewrite', 'yui_css' => 'assetic.filter.yui_css'));
    }

    /**
     * Gets the 'aws_as' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonAS A AmazonAS instance.
     */
    protected function getAwsAsService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_as'] = $this->get('aws_factory')->get($this->get('aws'), 'AS');
    }

    /**
     * Gets the 'aws_cloud_formation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonCloudFormation A AmazonCloudFormation instance.
     */
    protected function getAwsCloudFormationService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_cloud_formation'] = $this->get('aws_factory')->get($this->get('aws'), 'CloudFormation');
    }

    /**
     * Gets the 'aws_cloud_front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonCloudFront A AmazonCloudFront instance.
     */
    protected function getAwsCloudFrontService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_cloud_front'] = $this->get('aws_factory')->get($this->get('aws'), 'CloudFront');
    }

    /**
     * Gets the 'aws_cloud_search' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonCloudSearch A AmazonCloudSearch instance.
     */
    protected function getAwsCloudSearchService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_cloud_search'] = $this->get('aws_factory')->get($this->get('aws'), 'CloudSearch');
    }

    /**
     * Gets the 'aws_cloud_watch' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonCloudWatch A AmazonCloudWatch instance.
     */
    protected function getAwsCloudWatchService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_cloud_watch'] = $this->get('aws_factory')->get($this->get('aws'), 'CloudWatch');
    }

    /**
     * Gets the 'aws_dynamo_db' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonDynamoDB A AmazonDynamoDB instance.
     */
    protected function getAwsDynamoDbService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_dynamo_db'] = $this->get('aws_factory')->get($this->get('aws'), 'DynamoDB');
    }

    /**
     * Gets the 'aws_ec2' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonEC2 A AmazonEC2 instance.
     */
    protected function getAwsEc2Service()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_ec2'] = $this->get('aws_factory')->get($this->get('aws'), 'EC2');
    }

    /**
     * Gets the 'aws_elasti_cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonElastiCache A AmazonElastiCache instance.
     */
    protected function getAwsElastiCacheService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_elasti_cache'] = $this->get('aws_factory')->get($this->get('aws'), 'ElastiCache');
    }

    /**
     * Gets the 'aws_elastic_beanstalk' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonElasticBeanstalk A AmazonElasticBeanstalk instance.
     */
    protected function getAwsElasticBeanstalkService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_elastic_beanstalk'] = $this->get('aws_factory')->get($this->get('aws'), 'ElasticBeanstalk');
    }

    /**
     * Gets the 'aws_elb' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonELB A AmazonELB instance.
     */
    protected function getAwsElbService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_elb'] = $this->get('aws_factory')->get($this->get('aws'), 'ELB');
    }

    /**
     * Gets the 'aws_emr' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonEMR A AmazonEMR instance.
     */
    protected function getAwsEmrService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_emr'] = $this->get('aws_factory')->get($this->get('aws'), 'EMR');
    }

    /**
     * Gets the 'aws_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Cybernox\AmazonWebServicesBundle\AmazonWebServicesFactory A Cybernox\AmazonWebServicesBundle\AmazonWebServicesFactory instance.
     */
    protected function getAwsFactoryService()
    {
        return $this->services['aws_factory'] = new \Cybernox\AmazonWebServicesBundle\AmazonWebServicesFactory();
    }

    /**
     * Gets the 'aws_iam' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonIAM A AmazonIAM instance.
     */
    protected function getAwsIamService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_iam'] = $this->get('aws_factory')->get($this->get('aws'), 'IAM');
    }

    /**
     * Gets the 'aws_import_export' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonImportExport A AmazonImportExport instance.
     */
    protected function getAwsImportExportService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_import_export'] = $this->get('aws_factory')->get($this->get('aws'), 'ImportExport');
    }

    /**
     * Gets the 'aws_rds' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonRDS A AmazonRDS instance.
     */
    protected function getAwsRdsService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_rds'] = $this->get('aws_factory')->get($this->get('aws'), 'RDS');
    }

    /**
     * Gets the 'aws_s3' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonS3 A AmazonS3 instance.
     */
    protected function getAwsS3Service()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_s3'] = $this->get('aws_factory')->get($this->get('aws'), 'S3');
    }

    /**
     * Gets the 'aws_sdb' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonSDB A AmazonSDB instance.
     */
    protected function getAwsSdbService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_sdb'] = $this->get('aws_factory')->get($this->get('aws'), 'SDB');
    }

    /**
     * Gets the 'aws_ses' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonSES A AmazonSES instance.
     */
    protected function getAwsSesService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_ses'] = $this->get('aws_factory')->get($this->get('aws'), 'SES');
    }

    /**
     * Gets the 'aws_sns' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonSNS A AmazonSNS instance.
     */
    protected function getAwsSnsService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_sns'] = $this->get('aws_factory')->get($this->get('aws'), 'SNS');
    }

    /**
     * Gets the 'aws_sqs' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonSQS A AmazonSQS instance.
     */
    protected function getAwsSqsService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_sqs'] = $this->get('aws_factory')->get($this->get('aws'), 'SQS');
    }

    /**
     * Gets the 'aws_sts' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonSTS A AmazonSTS instance.
     */
    protected function getAwsStsService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_sts'] = $this->get('aws_factory')->get($this->get('aws'), 'STS');
    }

    /**
     * Gets the 'aws_swf' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return AmazonSWF A AmazonSWF instance.
     */
    protected function getAwsSwfService()
    {
        require_once '/var/www/ology4/app/../vendor/aws-sdk-for-php/sdk.class.php';

        return $this->services['aws_swf'] = $this->get('aws_factory')->get($this->get('aws'), 'SWF');
    }

    /**
     * Gets the 'cache_warmer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate A Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate instance.
     */
    protected function getCacheWarmerService()
    {
        $a = $this->get('kernel');
        $b = $this->get('templating.name_parser');

        $c = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TemplateFinder($a, $b, '/var/www/ology4/app/Resources');

        return $this->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(array(0 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TemplatePathsCacheWarmer($c, $this->get('templating.locator')), 1 => new \Symfony\Bundle\AsseticBundle\CacheWarmer\AssetManagerCacheWarmer($this), 2 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\RouterCacheWarmer($this->get('router')), 3 => new \Symfony\Bundle\TwigBundle\CacheWarmer\TemplateCacheCacheWarmer($this, $c), 4 => new \Symfony\Bridge\Doctrine\CacheWarmer\ProxyCacheWarmer($this->get('doctrine')), 5 => new \Symfony\Bundle\AsseticBundle\CacheWarmer\AssetWriterCacheWarmer($this, new \Assetic\AssetWriter('s3://AKIAIQBND6UM45VZUBUA:lHvP0WwsQ3Sumi/CG9m+PSfKqXd8OFNILoGauYq/@ology/'))));
    }

    /**
     * Gets the 'doctrine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\DoctrineBundle\Registry A Symfony\Bundle\DoctrineBundle\Registry instance.
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Symfony\Bundle\DoctrineBundle\Registry($this, array('default' => 'doctrine.dbal.default_connection'), array('default' => 'doctrine.orm.default_entity_manager'), 'default', 'default');
    }

    /**
     * Gets the 'doctrine.dbal.connection_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\DoctrineBundle\ConnectionFactory A Symfony\Bundle\DoctrineBundle\ConnectionFactory instance.
     */
    protected function getDoctrine_Dbal_ConnectionFactoryService()
    {
        return $this->services['doctrine.dbal.connection_factory'] = new \Symfony\Bundle\DoctrineBundle\ConnectionFactory(array());
    }

    /**
     * Gets the 'doctrine.dbal.default_connection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return stdClass A stdClass instance.
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = new \Doctrine\DBAL\Configuration();
        $a->setSQLLogger(new \Symfony\Bridge\Doctrine\Logger\DbalLogger($this->get('monolog.logger.doctrine')));

        $b = new \Doctrine\Common\EventManager();
        $b->addEventSubscriber(new \Doctrine\DBAL\Event\Listeners\MysqlSessionInit('UTF8'));
        $b->addEventSubscriber(new \FOS\UserBundle\Entity\UserListener($this));
        $b->addEventSubscriber(new \FOQ\ElasticaBundle\Doctrine\ORM\Listener($this->get('foq_elastica.object_persister.website.ology'), 'Ology\\SocialBundle\\Entity\\Ology', array(0 => 'postPersist', 1 => 'postUpdate', 2 => 'postRemove', 3 => 'preRemove'), 'id', ''));
        $b->addEventSubscriber(new \FOQ\ElasticaBundle\Doctrine\ORM\Listener($this->get('foq_elastica.object_persister.website.user'), 'Ology\\SocialBundle\\Entity\\User', array(0 => 'postPersist', 1 => 'postUpdate', 2 => 'postRemove', 3 => 'preRemove'), 'id', ''));
        $b->addEventSubscriber(new \FOQ\ElasticaBundle\Doctrine\ORM\Listener($this->get('foq_elastica.object_persister.website.post'), 'Ology\\SocialBundle\\Entity\\Post', array(0 => 'postPersist', 1 => 'postUpdate', 2 => 'postRemove', 3 => 'preRemove'), 'id', ''));

        return $this->services['doctrine.dbal.default_connection'] = $this->get('doctrine.dbal.connection_factory')->createConnection(array('dbname' => 'mydb', 'host' => 'localhost', 'port' => '3306', 'user' => 'root', 'password' => 'root', 'driver' => 'pdo_mysql', 'driverOptions' => array()), $a, $b, array());
    }

    /**
     * Gets the 'doctrine.orm.default_entity_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Doctrine\ORM\EntityManager A Doctrine\ORM\EntityManager instance.
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService()
    {
        $a = new \Doctrine\Common\Cache\ApcCache();
        $a->setNamespace('sf2orm_default_4ec248a1c2572449c55d3906a58da4c9');

        $b = new \Doctrine\Common\Cache\ApcCache();
        $b->setNamespace('sf2orm_default_4ec248a1c2572449c55d3906a58da4c9');

        $c = new \Doctrine\Common\Cache\ApcCache();
        $c->setNamespace('sf2orm_default_4ec248a1c2572449c55d3906a58da4c9');

        $d = new \Symfony\Bridge\Doctrine\Mapping\Driver\XmlDriver(array(0 => '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/config/doctrine'));
        $d->setNamespacePrefixes(array('/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/config/doctrine' => 'FOS\\UserBundle\\Entity'));
        $d->setGlobalBasename('mapping');

        $e = new \Doctrine\ORM\Mapping\Driver\DriverChain();
        $e->addDriver(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(new \Symfony\Bridge\Doctrine\Annotations\IndexedReader($this->get('annotation_reader')), array(0 => '/var/www/ology4/src/Ology/SocialBundle/Entity')), 'Ology\\SocialBundle\\Entity');
        $e->addDriver($d, 'FOS\\UserBundle\\Entity');

        $f = new \Doctrine\ORM\Configuration();
        $f->setEntityNamespaces(array('OlogySocialBundle' => 'Ology\\SocialBundle\\Entity', 'FOSUserBundle' => 'FOS\\UserBundle\\Entity'));
        $f->setMetadataCacheImpl($a);
        $f->setQueryCacheImpl($b);
        $f->setResultCacheImpl($c);
        $f->setMetadataDriverImpl($e);
        $f->setProxyDir('/var/www/ology4/app/cache/prod/doctrine/orm/Proxies');
        $f->setProxyNamespace('Proxies');
        $f->setAutoGenerateProxyClasses(true);
        $f->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');

        return $this->services['doctrine.orm.default_entity_manager'] = call_user_func(array('Doctrine\\ORM\\EntityManager', 'create'), $this->get('doctrine.dbal.default_connection'), $f);
    }

    /**
     * Gets the 'doctrine.orm.validator.unique' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator A Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator instance.
     */
    protected function getDoctrine_Orm_Validator_UniqueService()
    {
        return $this->services['doctrine.orm.validator.unique'] = new \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator($this->get('doctrine'));
    }

    /**
     * Gets the 'doctrine.orm.validator_initializer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Doctrine\Validator\EntityInitializer A Symfony\Bridge\Doctrine\Validator\EntityInitializer instance.
     */
    protected function getDoctrine_Orm_ValidatorInitializerService()
    {
        return $this->services['doctrine.orm.validator_initializer'] = new \Symfony\Bridge\Doctrine\Validator\EntityInitializer($this->get('doctrine'));
    }

    /**
     * Gets the 'estrisa_twig_image_tag.extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Estrisa\Bundle\TwigImageTagBundle\Twig\ImageTagExtension A Estrisa\Bundle\TwigImageTagBundle\Twig\ImageTagExtension instance.
     */
    protected function getEstrisaTwigImageTag_ExtensionService()
    {
        return $this->services['estrisa_twig_image_tag.extension'] = new \Estrisa\Bundle\TwigImageTagBundle\Twig\ImageTagExtension($this);
    }

    /**
     * Gets the 'event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Debug\TraceableEventDispatcher A Symfony\Bundle\FrameworkBundle\Debug\TraceableEventDispatcher instance.
     */
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Bundle\FrameworkBundle\Debug\TraceableEventDispatcher($this, $this->get('monolog.logger.event'));

        $instance->addListenerService('kernel.response', array(0 => 'kernel.listener.ology.login', 1 => 'onKernelResponse'), 0);
        $instance->addListenerService('security.interactive_login', array(0 => 'kernel.listener.ology.login', 1 => 'onSecurityInteractiveLogin'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'router_listener', 1 => 'onEarlyKernelRequest'), 255);
        $instance->addListenerService('kernel.request', array(0 => 'router_listener', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.response', array(0 => 'response_listener', 1 => 'onKernelResponse'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'session_listener', 1 => 'onKernelRequest'), 128);
        $instance->addListenerService('kernel.request', array(0 => 'security.firewall', 1 => 'onKernelRequest'), 64);
        $instance->addListenerService('kernel.response', array(0 => 'security.rememberme.response_listener', 1 => 'onKernelResponse'), 0);
        $instance->addListenerService('kernel.exception', array(0 => 'twig.exception_listener', 1 => 'onKernelException'), -128);
        $instance->addListenerService('kernel.controller', array(0 => 'sensio_framework_extra.controller.listener', 1 => 'onKernelController'), 0);
        $instance->addListenerService('kernel.controller', array(0 => 'sensio_framework_extra.converter.listener', 1 => 'onKernelController'), 0);
        $instance->addListenerService('kernel.controller', array(0 => 'sensio_framework_extra.view.listener', 1 => 'onKernelController'), 0);
        $instance->addListenerService('kernel.view', array(0 => 'sensio_framework_extra.view.listener', 1 => 'onKernelView'), 0);
        $instance->addListenerService('kernel.response', array(0 => 'sensio_framework_extra.cache.listener', 1 => 'onKernelResponse'), 0);
        $instance->addListenerService('kernel.controller', array(0 => 'security.extra.controller_listener', 1 => 'onCoreController'), -255);
        $instance->addListenerService('security.interactive_login', array(0 => 'fos_user.security.interactive_login_listener', 1 => 'onSecurityInteractiveLogin'), 0);

        return $instance;
    }

    /**
     * Gets the 'file_locator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\HttpKernel\Config\FileLocator A Symfony\Component\HttpKernel\Config\FileLocator instance.
     */
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator($this->get('kernel'), '/var/www/ology4/app/Resources');
    }

    /**
     * Gets the 'filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\HttpKernel\Util\Filesystem A Symfony\Component\HttpKernel\Util\Filesystem instance.
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\HttpKernel\Util\Filesystem();
    }

    /**
     * Gets the 'foq_elastica.client.search1' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Client A FOQ\ElasticaBundle\Client instance.
     */
    protected function getFoqElastica_Client_Search1Service()
    {
        $this->services['foq_elastica.client.search1'] = $instance = new \FOQ\ElasticaBundle\Client(array('host' => 'localhost', 'port' => 9200));

        $instance->setLogger($this->get('foq_elastica.logger'));

        return $instance;
    }

    /**
     * Gets the 'foq_elastica.data_collector' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\DataCollector\ElasticaDataCollector A FOQ\ElasticaBundle\DataCollector\ElasticaDataCollector instance.
     */
    protected function getFoqElastica_DataCollectorService()
    {
        return $this->services['foq_elastica.data_collector'] = new \FOQ\ElasticaBundle\DataCollector\ElasticaDataCollector($this->get('foq_elastica.logger'));
    }

    /**
     * Gets the 'foq_elastica.finder.website.ology' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Finder\TransformedFinder A FOQ\ElasticaBundle\Finder\TransformedFinder instance.
     */
    protected function getFoqElastica_Finder_Website_OlogyService()
    {
        return $this->services['foq_elastica.finder.website.ology'] = new \FOQ\ElasticaBundle\Finder\TransformedFinder($this->get('foq_elastica.index.website')->getType('ology'), new \FOQ\ElasticaBundle\Doctrine\ORM\ElasticaToModelTransformer($this->get('doctrine'), 'Ology\\SocialBundle\\Entity\\Ology', array('identifier' => 'id', 'hydrate' => true)));
    }

    /**
     * Gets the 'foq_elastica.finder.website.post' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Finder\TransformedFinder A FOQ\ElasticaBundle\Finder\TransformedFinder instance.
     */
    protected function getFoqElastica_Finder_Website_PostService()
    {
        return $this->services['foq_elastica.finder.website.post'] = new \FOQ\ElasticaBundle\Finder\TransformedFinder($this->get('foq_elastica.index.website')->getType('post'), new \FOQ\ElasticaBundle\Doctrine\ORM\ElasticaToModelTransformer($this->get('doctrine'), 'Ology\\SocialBundle\\Entity\\Post', array('identifier' => 'id', 'hydrate' => true)));
    }

    /**
     * Gets the 'foq_elastica.finder.website.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Finder\TransformedFinder A FOQ\ElasticaBundle\Finder\TransformedFinder instance.
     */
    protected function getFoqElastica_Finder_Website_UserService()
    {
        return $this->services['foq_elastica.finder.website.user'] = new \FOQ\ElasticaBundle\Finder\TransformedFinder($this->get('foq_elastica.index.website')->getType('user'), new \FOQ\ElasticaBundle\Doctrine\ORM\ElasticaToModelTransformer($this->get('doctrine'), 'Ology\\SocialBundle\\Entity\\User', array('identifier' => 'id', 'hydrate' => true)));
    }

    /**
     * Gets the 'foq_elastica.index.website' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Elastica_Index A Elastica_Index instance.
     */
    protected function getFoqElastica_Index_WebsiteService()
    {
        return $this->services['foq_elastica.index.website'] = $this->get('foq_elastica.client.search1')->getIndex('website');
    }

    /**
     * Gets the 'foq_elastica.index.website.ology' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Elastica_Type A Elastica_Type instance.
     */
    protected function getFoqElastica_Index_Website_OlogyService()
    {
        return $this->services['foq_elastica.index.website.ology'] = $this->get('foq_elastica.index.website')->getType('ology');
    }

    /**
     * Gets the 'foq_elastica.index.website.post' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Elastica_Type A Elastica_Type instance.
     */
    protected function getFoqElastica_Index_Website_PostService()
    {
        return $this->services['foq_elastica.index.website.post'] = $this->get('foq_elastica.index.website')->getType('post');
    }

    /**
     * Gets the 'foq_elastica.index.website.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Elastica_Type A Elastica_Type instance.
     */
    protected function getFoqElastica_Index_Website_UserService()
    {
        return $this->services['foq_elastica.index.website.user'] = $this->get('foq_elastica.index.website')->getType('user');
    }

    /**
     * Gets the 'foq_elastica.index_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\IndexManager A FOQ\ElasticaBundle\IndexManager instance.
     */
    protected function getFoqElastica_IndexManagerService()
    {
        $a = $this->get('foq_elastica.index.website');

        return $this->services['foq_elastica.index_manager'] = new \FOQ\ElasticaBundle\IndexManager(array('website' => $a), $a);
    }

    /**
     * Gets the 'foq_elastica.logger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Logger\ElasticaLogger A FOQ\ElasticaBundle\Logger\ElasticaLogger instance.
     */
    protected function getFoqElastica_LoggerService()
    {
        return $this->services['foq_elastica.logger'] = new \FOQ\ElasticaBundle\Logger\ElasticaLogger($this->get('monolog.logger.elastica'));
    }

    /**
     * Gets the 'foq_elastica.manager.orm' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Doctrine\RepositoryManager A FOQ\ElasticaBundle\Doctrine\RepositoryManager instance.
     */
    protected function getFoqElastica_Manager_OrmService()
    {
        $this->services['foq_elastica.manager.orm'] = $instance = new \FOQ\ElasticaBundle\Doctrine\RepositoryManager($this->get('doctrine'), $this->get('annotation_reader'));

        $instance->addEntity('Ology\\SocialBundle\\Entity\\Ology', $this->get('foq_elastica.finder.website.ology'));
        $instance->addEntity('Ology\\SocialBundle\\Entity\\User', $this->get('foq_elastica.finder.website.user'));
        $instance->addEntity('Ology\\SocialBundle\\Entity\\Post', $this->get('foq_elastica.finder.website.post'));

        return $instance;
    }

    /**
     * Gets the 'foq_elastica.object_persister.website.ology' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Persister\ObjectPersister A FOQ\ElasticaBundle\Persister\ObjectPersister instance.
     */
    protected function getFoqElastica_ObjectPersister_Website_OlogyService()
    {
        return $this->services['foq_elastica.object_persister.website.ology'] = new \FOQ\ElasticaBundle\Persister\ObjectPersister($this->get('foq_elastica.index.website')->getType('ology'), new \FOQ\ElasticaBundle\Transformer\ModelToElasticaAutoTransformer(array('identifier' => 'id')), 'Ology\\SocialBundle\\Entity\\Ology', array(0 => 'name', 1 => 'description'));
    }

    /**
     * Gets the 'foq_elastica.object_persister.website.post' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Persister\ObjectPersister A FOQ\ElasticaBundle\Persister\ObjectPersister instance.
     */
    protected function getFoqElastica_ObjectPersister_Website_PostService()
    {
        return $this->services['foq_elastica.object_persister.website.post'] = new \FOQ\ElasticaBundle\Persister\ObjectPersister($this->get('foq_elastica.index.website')->getType('post'), new \FOQ\ElasticaBundle\Transformer\ModelToElasticaAutoTransformer(array('identifier' => 'id')), 'Ology\\SocialBundle\\Entity\\Post', array(0 => 'title'));
    }

    /**
     * Gets the 'foq_elastica.object_persister.website.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Persister\ObjectPersister A FOQ\ElasticaBundle\Persister\ObjectPersister instance.
     */
    protected function getFoqElastica_ObjectPersister_Website_UserService()
    {
        return $this->services['foq_elastica.object_persister.website.user'] = new \FOQ\ElasticaBundle\Persister\ObjectPersister($this->get('foq_elastica.index.website')->getType('user'), new \FOQ\ElasticaBundle\Transformer\ModelToElasticaAutoTransformer(array('identifier' => 'id')), 'Ology\\SocialBundle\\Entity\\User', array(0 => 'firstName', 1 => 'lastName', 2 => 'top1', 3 => 'top2', 4 => 'top3'));
    }

    /**
     * Gets the 'foq_elastica.provider.website.ology' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Doctrine\ORM\Provider A FOQ\ElasticaBundle\Doctrine\ORM\Provider instance.
     */
    protected function getFoqElastica_Provider_Website_OlogyService()
    {
        return $this->services['foq_elastica.provider.website.ology'] = new \FOQ\ElasticaBundle\Doctrine\ORM\Provider($this->get('foq_elastica.object_persister.website.ology'), 'Ology\\SocialBundle\\Entity\\Ology', array('batch_size' => 10, 'query_builder_method' => 'createQueryBuilder', 'clear_object_manager' => true), $this->get('doctrine'));
    }

    /**
     * Gets the 'foq_elastica.provider.website.post' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Doctrine\ORM\Provider A FOQ\ElasticaBundle\Doctrine\ORM\Provider instance.
     */
    protected function getFoqElastica_Provider_Website_PostService()
    {
        return $this->services['foq_elastica.provider.website.post'] = new \FOQ\ElasticaBundle\Doctrine\ORM\Provider($this->get('foq_elastica.object_persister.website.post'), 'Ology\\SocialBundle\\Entity\\Post', array('batch_size' => 10, 'query_builder_method' => 'createQueryBuilder', 'clear_object_manager' => true), $this->get('doctrine'));
    }

    /**
     * Gets the 'foq_elastica.provider.website.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Doctrine\ORM\Provider A FOQ\ElasticaBundle\Doctrine\ORM\Provider instance.
     */
    protected function getFoqElastica_Provider_Website_UserService()
    {
        return $this->services['foq_elastica.provider.website.user'] = new \FOQ\ElasticaBundle\Doctrine\ORM\Provider($this->get('foq_elastica.object_persister.website.user'), 'Ology\\SocialBundle\\Entity\\User', array('batch_size' => 10, 'query_builder_method' => 'createQueryBuilder', 'clear_object_manager' => true), $this->get('doctrine'));
    }

    /**
     * Gets the 'foq_elastica.provider_registry' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Provider\ProviderRegistry A FOQ\ElasticaBundle\Provider\ProviderRegistry instance.
     */
    protected function getFoqElastica_ProviderRegistryService()
    {
        $this->services['foq_elastica.provider_registry'] = $instance = new \FOQ\ElasticaBundle\Provider\ProviderRegistry();

        $instance->setContainer($this);
        $instance->addProvider('website', 'ology', 'foq_elastica.provider.website.ology');
        $instance->addProvider('website', 'user', 'foq_elastica.provider.website.user');
        $instance->addProvider('website', 'post', 'foq_elastica.provider.website.post');

        return $instance;
    }

    /**
     * Gets the 'foq_elastica.resetter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOQ\ElasticaBundle\Resetter A FOQ\ElasticaBundle\Resetter instance.
     */
    protected function getFoqElastica_ResetterService()
    {
        return $this->services['foq_elastica.resetter'] = new \FOQ\ElasticaBundle\Resetter(array('website' => array('index' => $this->get('foq_elastica.index.website'), 'config' => array('mappings' => array('ology' => array('properties' => array('name' => array('boost' => 10, 'analyzer' => 'ology_analyzer', 'type' => 'string', 'fields' => array()), 'description' => array('boost' => 7, 'analyzer' => 'ology_analyzer', 'type' => 'string', 'fields' => array()))), 'user' => array('properties' => array('firstName' => array('boost' => 5, 'analyzer' => 'ology_analyzer', 'type' => 'string', 'fields' => array()), 'lastName' => array('boost' => 5, 'analyzer' => 'ology_analyzer', 'type' => 'string', 'fields' => array()), 'top1' => array('boost' => 3, 'analyzer' => 'ology_analyzer', 'type' => 'string', 'fields' => array()), 'top2' => array('boost' => 3, 'analyzer' => 'ology_analyzer', 'type' => 'string', 'fields' => array()), 'top3' => array('boost' => 3, 'analyzer' => 'ology_analyzer', 'type' => 'string', 'fields' => array()))), 'post' => array('properties' => array('title' => array('boost' => 8, 'analyzer' => 'ology_analyzer', 'type' => 'string', 'fields' => array())))), 'settings' => array('index' => array('analysis' => array('analyzer' => array('ology_analyzer' => array('type' => 'custom', 'tokenizer' => 'lowercase', 'filter' => array(0 => 'ology_ngram'))), 'filter' => array('ology_ngram' => array('type' => 'nGram', 'min_gram' => 3, 'max_gram' => 15)))))))));
    }

    /**
     * Gets the 'form.csrf_provider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider A Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider instance.
     */
    protected function getForm_CsrfProviderService()
    {
        return $this->services['form.csrf_provider'] = new \Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider($this->get('session'), '96124ff1e2f975ca7f7df58bb204d94b46139265');
    }

    /**
     * Gets the 'form.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\FormFactory A Symfony\Component\Form\FormFactory instance.
     */
    protected function getForm_FactoryService()
    {
        return $this->services['form.factory'] = new \Symfony\Component\Form\FormFactory(array(0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension($this, array('field' => 'form.type.field', 'form' => 'form.type.form', 'birthday' => 'form.type.birthday', 'checkbox' => 'form.type.checkbox', 'choice' => 'form.type.choice', 'collection' => 'form.type.collection', 'country' => 'form.type.country', 'date' => 'form.type.date', 'datetime' => 'form.type.datetime', 'email' => 'form.type.email', 'file' => 'form.type.file', 'hidden' => 'form.type.hidden', 'integer' => 'form.type.integer', 'language' => 'form.type.language', 'locale' => 'form.type.locale', 'money' => 'form.type.money', 'number' => 'form.type.number', 'password' => 'form.type.password', 'percent' => 'form.type.percent', 'radio' => 'form.type.radio', 'repeated' => 'form.type.repeated', 'search' => 'form.type.search', 'textarea' => 'form.type.textarea', 'text' => 'form.type.text', 'time' => 'form.type.time', 'timezone' => 'form.type.timezone', 'url' => 'form.type.url', 'csrf' => 'form.type.csrf', 'entity' => 'form.type.entity', 'ology_user_registration' => 'social.registration.form.type', 'ology_user_resetting' => 'social.resetting.form.type', 'fos_user_username' => 'fos_user.username_form_type', 'fos_user_profile' => 'fos_user.profile.form.type', 'fos_user_registration' => 'fos_user.registration.form.type', 'fos_user_change_password' => 'fos_user.change_password.form.type', 'fos_user_resetting' => 'fos_user.resetting.form.type'), array('field' => array(0 => 'form.type_extension.field'), 'form' => array(0 => 'form.type_extension.csrf')), array(0 => 'form.type_guesser.validator', 1 => 'form.type_guesser.doctrine'))));
    }

    /**
     * Gets the 'form.type.birthday' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\BirthdayType A Symfony\Component\Form\Extension\Core\Type\BirthdayType instance.
     */
    protected function getForm_Type_BirthdayService()
    {
        return $this->services['form.type.birthday'] = new \Symfony\Component\Form\Extension\Core\Type\BirthdayType();
    }

    /**
     * Gets the 'form.type.checkbox' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\CheckboxType A Symfony\Component\Form\Extension\Core\Type\CheckboxType instance.
     */
    protected function getForm_Type_CheckboxService()
    {
        return $this->services['form.type.checkbox'] = new \Symfony\Component\Form\Extension\Core\Type\CheckboxType();
    }

    /**
     * Gets the 'form.type.choice' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\ChoiceType A Symfony\Component\Form\Extension\Core\Type\ChoiceType instance.
     */
    protected function getForm_Type_ChoiceService()
    {
        return $this->services['form.type.choice'] = new \Symfony\Component\Form\Extension\Core\Type\ChoiceType();
    }

    /**
     * Gets the 'form.type.collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\CollectionType A Symfony\Component\Form\Extension\Core\Type\CollectionType instance.
     */
    protected function getForm_Type_CollectionService()
    {
        return $this->services['form.type.collection'] = new \Symfony\Component\Form\Extension\Core\Type\CollectionType();
    }

    /**
     * Gets the 'form.type.country' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\CountryType A Symfony\Component\Form\Extension\Core\Type\CountryType instance.
     */
    protected function getForm_Type_CountryService()
    {
        return $this->services['form.type.country'] = new \Symfony\Component\Form\Extension\Core\Type\CountryType();
    }

    /**
     * Gets the 'form.type.csrf' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Csrf\Type\CsrfType A Symfony\Component\Form\Extension\Csrf\Type\CsrfType instance.
     */
    protected function getForm_Type_CsrfService()
    {
        return $this->services['form.type.csrf'] = new \Symfony\Component\Form\Extension\Csrf\Type\CsrfType($this->get('form.csrf_provider'));
    }

    /**
     * Gets the 'form.type.date' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\DateType A Symfony\Component\Form\Extension\Core\Type\DateType instance.
     */
    protected function getForm_Type_DateService()
    {
        return $this->services['form.type.date'] = new \Symfony\Component\Form\Extension\Core\Type\DateType();
    }

    /**
     * Gets the 'form.type.datetime' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\DateTimeType A Symfony\Component\Form\Extension\Core\Type\DateTimeType instance.
     */
    protected function getForm_Type_DatetimeService()
    {
        return $this->services['form.type.datetime'] = new \Symfony\Component\Form\Extension\Core\Type\DateTimeType();
    }

    /**
     * Gets the 'form.type.email' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\EmailType A Symfony\Component\Form\Extension\Core\Type\EmailType instance.
     */
    protected function getForm_Type_EmailService()
    {
        return $this->services['form.type.email'] = new \Symfony\Component\Form\Extension\Core\Type\EmailType();
    }

    /**
     * Gets the 'form.type.entity' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Doctrine\Form\Type\EntityType A Symfony\Bridge\Doctrine\Form\Type\EntityType instance.
     */
    protected function getForm_Type_EntityService()
    {
        return $this->services['form.type.entity'] = new \Symfony\Bridge\Doctrine\Form\Type\EntityType($this->get('doctrine'));
    }

    /**
     * Gets the 'form.type.field' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\FieldType A Symfony\Component\Form\Extension\Core\Type\FieldType instance.
     */
    protected function getForm_Type_FieldService()
    {
        return $this->services['form.type.field'] = new \Symfony\Component\Form\Extension\Core\Type\FieldType($this->get('validator'));
    }

    /**
     * Gets the 'form.type.file' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\FileType A Symfony\Component\Form\Extension\Core\Type\FileType instance.
     */
    protected function getForm_Type_FileService()
    {
        return $this->services['form.type.file'] = new \Symfony\Component\Form\Extension\Core\Type\FileType();
    }

    /**
     * Gets the 'form.type.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\FormType A Symfony\Component\Form\Extension\Core\Type\FormType instance.
     */
    protected function getForm_Type_FormService()
    {
        return $this->services['form.type.form'] = new \Symfony\Component\Form\Extension\Core\Type\FormType();
    }

    /**
     * Gets the 'form.type.hidden' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\HiddenType A Symfony\Component\Form\Extension\Core\Type\HiddenType instance.
     */
    protected function getForm_Type_HiddenService()
    {
        return $this->services['form.type.hidden'] = new \Symfony\Component\Form\Extension\Core\Type\HiddenType();
    }

    /**
     * Gets the 'form.type.integer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\IntegerType A Symfony\Component\Form\Extension\Core\Type\IntegerType instance.
     */
    protected function getForm_Type_IntegerService()
    {
        return $this->services['form.type.integer'] = new \Symfony\Component\Form\Extension\Core\Type\IntegerType();
    }

    /**
     * Gets the 'form.type.language' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\LanguageType A Symfony\Component\Form\Extension\Core\Type\LanguageType instance.
     */
    protected function getForm_Type_LanguageService()
    {
        return $this->services['form.type.language'] = new \Symfony\Component\Form\Extension\Core\Type\LanguageType();
    }

    /**
     * Gets the 'form.type.locale' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\LocaleType A Symfony\Component\Form\Extension\Core\Type\LocaleType instance.
     */
    protected function getForm_Type_LocaleService()
    {
        return $this->services['form.type.locale'] = new \Symfony\Component\Form\Extension\Core\Type\LocaleType();
    }

    /**
     * Gets the 'form.type.money' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\MoneyType A Symfony\Component\Form\Extension\Core\Type\MoneyType instance.
     */
    protected function getForm_Type_MoneyService()
    {
        return $this->services['form.type.money'] = new \Symfony\Component\Form\Extension\Core\Type\MoneyType();
    }

    /**
     * Gets the 'form.type.number' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\NumberType A Symfony\Component\Form\Extension\Core\Type\NumberType instance.
     */
    protected function getForm_Type_NumberService()
    {
        return $this->services['form.type.number'] = new \Symfony\Component\Form\Extension\Core\Type\NumberType();
    }

    /**
     * Gets the 'form.type.password' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\PasswordType A Symfony\Component\Form\Extension\Core\Type\PasswordType instance.
     */
    protected function getForm_Type_PasswordService()
    {
        return $this->services['form.type.password'] = new \Symfony\Component\Form\Extension\Core\Type\PasswordType();
    }

    /**
     * Gets the 'form.type.percent' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\PercentType A Symfony\Component\Form\Extension\Core\Type\PercentType instance.
     */
    protected function getForm_Type_PercentService()
    {
        return $this->services['form.type.percent'] = new \Symfony\Component\Form\Extension\Core\Type\PercentType();
    }

    /**
     * Gets the 'form.type.radio' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\RadioType A Symfony\Component\Form\Extension\Core\Type\RadioType instance.
     */
    protected function getForm_Type_RadioService()
    {
        return $this->services['form.type.radio'] = new \Symfony\Component\Form\Extension\Core\Type\RadioType();
    }

    /**
     * Gets the 'form.type.repeated' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\RepeatedType A Symfony\Component\Form\Extension\Core\Type\RepeatedType instance.
     */
    protected function getForm_Type_RepeatedService()
    {
        return $this->services['form.type.repeated'] = new \Symfony\Component\Form\Extension\Core\Type\RepeatedType();
    }

    /**
     * Gets the 'form.type.search' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\SearchType A Symfony\Component\Form\Extension\Core\Type\SearchType instance.
     */
    protected function getForm_Type_SearchService()
    {
        return $this->services['form.type.search'] = new \Symfony\Component\Form\Extension\Core\Type\SearchType();
    }

    /**
     * Gets the 'form.type.text' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\TextType A Symfony\Component\Form\Extension\Core\Type\TextType instance.
     */
    protected function getForm_Type_TextService()
    {
        return $this->services['form.type.text'] = new \Symfony\Component\Form\Extension\Core\Type\TextType();
    }

    /**
     * Gets the 'form.type.textarea' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\TextareaType A Symfony\Component\Form\Extension\Core\Type\TextareaType instance.
     */
    protected function getForm_Type_TextareaService()
    {
        return $this->services['form.type.textarea'] = new \Symfony\Component\Form\Extension\Core\Type\TextareaType();
    }

    /**
     * Gets the 'form.type.time' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\TimeType A Symfony\Component\Form\Extension\Core\Type\TimeType instance.
     */
    protected function getForm_Type_TimeService()
    {
        return $this->services['form.type.time'] = new \Symfony\Component\Form\Extension\Core\Type\TimeType();
    }

    /**
     * Gets the 'form.type.timezone' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\TimezoneType A Symfony\Component\Form\Extension\Core\Type\TimezoneType instance.
     */
    protected function getForm_Type_TimezoneService()
    {
        return $this->services['form.type.timezone'] = new \Symfony\Component\Form\Extension\Core\Type\TimezoneType();
    }

    /**
     * Gets the 'form.type.url' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Core\Type\UrlType A Symfony\Component\Form\Extension\Core\Type\UrlType instance.
     */
    protected function getForm_Type_UrlService()
    {
        return $this->services['form.type.url'] = new \Symfony\Component\Form\Extension\Core\Type\UrlType();
    }

    /**
     * Gets the 'form.type_extension.csrf' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension A Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension instance.
     */
    protected function getForm_TypeExtension_CsrfService()
    {
        return $this->services['form.type_extension.csrf'] = new \Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension(true, '_token');
    }

    /**
     * Gets the 'form.type_extension.field' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Validator\Type\FieldTypeValidatorExtension A Symfony\Component\Form\Extension\Validator\Type\FieldTypeValidatorExtension instance.
     */
    protected function getForm_TypeExtension_FieldService()
    {
        return $this->services['form.type_extension.field'] = new \Symfony\Component\Form\Extension\Validator\Type\FieldTypeValidatorExtension($this->get('validator'));
    }

    /**
     * Gets the 'form.type_guesser.doctrine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser A Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser instance.
     */
    protected function getForm_TypeGuesser_DoctrineService()
    {
        return $this->services['form.type_guesser.doctrine'] = new \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser($this->get('doctrine'));
    }

    /**
     * Gets the 'form.type_guesser.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser A Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser instance.
     */
    protected function getForm_TypeGuesser_ValidatorService()
    {
        return $this->services['form.type_guesser.validator'] = new \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser($this->get('validator.mapping.class_metadata_factory'));
    }

    /**
     * Gets the 'fos_facebook.api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\FacebookBundle\Facebook\FacebookSessionPersistence A FOS\FacebookBundle\Facebook\FacebookSessionPersistence instance.
     */
    protected function getFosFacebook_ApiService()
    {
        require_once '/var/www/ology4/app/../vendor/facebook/src/base_facebook.php';

        return $this->services['fos_facebook.api'] = new \FOS\FacebookBundle\Facebook\FacebookSessionPersistence(array('appId' => '227147837348982', 'secret' => '16829129e525a56307489c8430189df0', 'cookie' => true, 'domain' => NULL), $this->get('session'));
    }

    /**
     * Gets the 'fos_facebook.helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\FacebookBundle\Templating\Helper\FacebookHelper A FOS\FacebookBundle\Templating\Helper\FacebookHelper instance.
     */
    protected function getFosFacebook_HelperService()
    {
        return $this->services['fos_facebook.helper'] = new \FOS\FacebookBundle\Templating\Helper\FacebookHelper($this->get('templating'), $this->get('fos_facebook.api'), true, 'en_US', array(0 => 'email', 1 => 'user_birthday', 2 => 'user_location', 3 => 'publish_stream'));
    }

    /**
     * Gets the 'fos_facebook.twig' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\FacebookBundle\Twig\Extension\FacebookExtension A FOS\FacebookBundle\Twig\Extension\FacebookExtension instance.
     */
    protected function getFosFacebook_TwigService()
    {
        return $this->services['fos_facebook.twig'] = new \FOS\FacebookBundle\Twig\Extension\FacebookExtension($this);
    }

    /**
     * Gets the 'fos_twitter.anywhere.helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\TwitterBundle\Templating\Helper\TwitterAnywhereHelper A FOS\TwitterBundle\Templating\Helper\TwitterAnywhereHelper instance.
     */
    protected function getFosTwitter_Anywhere_HelperService()
    {
        return $this->services['fos_twitter.anywhere.helper'] = new \FOS\TwitterBundle\Templating\Helper\TwitterAnywhereHelper($this->get('templating'), 'dFHS3YvEy2R6MIzAwmslQg', '1');
    }

    /**
     * Gets the 'fos_twitter.anywhere.twig' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\TwitterBundle\Twig\Extension\TwitterAnywhereExtension A FOS\TwitterBundle\Twig\Extension\TwitterAnywhereExtension instance.
     */
    protected function getFosTwitter_Anywhere_TwigService()
    {
        return $this->services['fos_twitter.anywhere.twig'] = new \FOS\TwitterBundle\Twig\Extension\TwitterAnywhereExtension($this);
    }

    /**
     * Gets the 'fos_twitter.api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return TwitterOAuth A TwitterOAuth instance.
     */
    protected function getFosTwitter_ApiService()
    {
        require_once '/var/www/ology4/app/../vendor/TwitterOAuth/twitteroauth/twitteroauth.php';

        return $this->services['fos_twitter.api'] = new \TwitterOAuth('dFHS3YvEy2R6MIzAwmslQg', 'qf5cqItorsHdLSypA1g9BJhj7a6aYnTg7E9FTGPvc');
    }

    /**
     * Gets the 'fos_twitter.service' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\TwitterBundle\Services\Twitter A FOS\TwitterBundle\Services\Twitter instance.
     */
    protected function getFosTwitter_ServiceService()
    {
        return $this->services['fos_twitter.service'] = new \FOS\TwitterBundle\Services\Twitter($this->get('fos_twitter.api'), 'http://ology4.comtwitter/check');
    }

    /**
     * Gets the 'fos_user.change_password.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Form A Symfony\Component\Form\Form instance.
     */
    protected function getFosUser_ChangePassword_FormService()
    {
        return $this->services['fos_user.change_password.form'] = $this->get('form.factory')->createNamed('fos_user_change_password', 'fos_user_change_password_form', '', array('validation_groups' => array(0 => 'ChangePassword', 1 => 'Default')));
    }

    /**
     * Gets the 'fos_user.change_password.form.handler.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Form\Handler\ChangePasswordFormHandler A FOS\UserBundle\Form\Handler\ChangePasswordFormHandler instance.
     */
    protected function getFosUser_ChangePassword_Form_Handler_DefaultService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('fos_user.change_password.form.handler.default', 'request');
        }

        return $this->services['fos_user.change_password.form.handler.default'] = $this->scopedServices['request']['fos_user.change_password.form.handler.default'] = new \FOS\UserBundle\Form\Handler\ChangePasswordFormHandler($this->get('fos_user.change_password.form'), $this->get('request'), $this->get('fos_user.user_manager'));
    }

    /**
     * Gets the 'fos_user.change_password.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Form\Type\ChangePasswordFormType A FOS\UserBundle\Form\Type\ChangePasswordFormType instance.
     */
    protected function getFosUser_ChangePassword_Form_TypeService()
    {
        return $this->services['fos_user.change_password.form.type'] = new \FOS\UserBundle\Form\Type\ChangePasswordFormType();
    }

    /**
     * Gets the 'fos_user.profile.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Form A Symfony\Component\Form\Form instance.
     */
    protected function getFosUser_Profile_FormService()
    {
        return $this->services['fos_user.profile.form'] = $this->get('form.factory')->createNamed('fos_user_profile', 'fos_user_profile_form', '', array('validation_groups' => array(0 => 'Profile', 1 => 'Default')));
    }

    /**
     * Gets the 'fos_user.profile.form.handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Form\Handler\ProfileFormHandler A FOS\UserBundle\Form\Handler\ProfileFormHandler instance.
     */
    protected function getFosUser_Profile_Form_HandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('fos_user.profile.form.handler', 'request');
        }

        return $this->services['fos_user.profile.form.handler'] = $this->scopedServices['request']['fos_user.profile.form.handler'] = new \FOS\UserBundle\Form\Handler\ProfileFormHandler($this->get('fos_user.profile.form'), $this->get('request'), $this->get('fos_user.user_manager'));
    }

    /**
     * Gets the 'fos_user.profile.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Form\Type\ProfileFormType A FOS\UserBundle\Form\Type\ProfileFormType instance.
     */
    protected function getFosUser_Profile_Form_TypeService()
    {
        return $this->services['fos_user.profile.form.type'] = new \FOS\UserBundle\Form\Type\ProfileFormType('Ology\\SocialBundle\\Entity\\User');
    }

    /**
     * Gets the 'fos_user.registration.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Form A Symfony\Component\Form\Form instance.
     */
    protected function getFosUser_Registration_FormService()
    {
        return $this->services['fos_user.registration.form'] = $this->get('form.factory')->createNamed('ology_user_registration', 'fos_user_registration_form', '', array('validation_groups' => array(0 => 'Registration', 1 => 'Default')));
    }

    /**
     * Gets the 'fos_user.registration.form.handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Forms\Handler\RegistrationFormHandler A Ology\SocialBundle\Forms\Handler\RegistrationFormHandler instance.
     */
    protected function getFosUser_Registration_Form_HandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('fos_user.registration.form.handler', 'request');
        }

        return $this->services['fos_user.registration.form.handler'] = $this->scopedServices['request']['fos_user.registration.form.handler'] = new \Ology\SocialBundle\Forms\Handler\RegistrationFormHandler($this->get('fos_user.registration.form'), $this->get('request'), $this->get('fos_user.user_manager'), $this->get('ology.mailer'));
    }

    /**
     * Gets the 'fos_user.registration.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Form\Type\RegistrationFormType A FOS\UserBundle\Form\Type\RegistrationFormType instance.
     */
    protected function getFosUser_Registration_Form_TypeService()
    {
        return $this->services['fos_user.registration.form.type'] = new \FOS\UserBundle\Form\Type\RegistrationFormType('Ology\\SocialBundle\\Entity\\User');
    }

    /**
     * Gets the 'fos_user.resetting.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Form\Form A Symfony\Component\Form\Form instance.
     */
    protected function getFosUser_Resetting_FormService()
    {
        return $this->services['fos_user.resetting.form'] = $this->get('form.factory')->createNamed('ology_user_resetting', 'fos_user_resetting_form', '', array('validation_groups' => array(0 => 'ResetPassword')));
    }

    /**
     * Gets the 'fos_user.resetting.form.handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Form\Handler\ResettingFormHandler A FOS\UserBundle\Form\Handler\ResettingFormHandler instance.
     */
    protected function getFosUser_Resetting_Form_HandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('fos_user.resetting.form.handler', 'request');
        }

        return $this->services['fos_user.resetting.form.handler'] = $this->scopedServices['request']['fos_user.resetting.form.handler'] = new \FOS\UserBundle\Form\Handler\ResettingFormHandler($this->get('fos_user.resetting.form'), $this->get('request'), $this->get('fos_user.user_manager'));
    }

    /**
     * Gets the 'fos_user.resetting.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Form\Type\ResettingFormType A FOS\UserBundle\Form\Type\ResettingFormType instance.
     */
    protected function getFosUser_Resetting_Form_TypeService()
    {
        return $this->services['fos_user.resetting.form.type'] = new \FOS\UserBundle\Form\Type\ResettingFormType();
    }

    /**
     * Gets the 'fos_user.security.interactive_login_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Security\InteractiveLoginListener A FOS\UserBundle\Security\InteractiveLoginListener instance.
     */
    protected function getFosUser_Security_InteractiveLoginListenerService()
    {
        return $this->services['fos_user.security.interactive_login_listener'] = new \FOS\UserBundle\Security\InteractiveLoginListener($this->get('fos_user.user_manager'));
    }

    /**
     * Gets the 'fos_user.user_checker' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Security\Core\User\UserChecker A Symfony\Component\Security\Core\User\UserChecker instance.
     */
    protected function getFosUser_UserCheckerService()
    {
        return $this->services['fos_user.user_checker'] = new \Symfony\Component\Security\Core\User\UserChecker();
    }

    /**
     * Gets the 'fos_user.user_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Entity\UserManager A FOS\UserBundle\Entity\UserManager instance.
     */
    protected function getFosUser_UserManagerService()
    {
        $a = $this->get('fos_user.util.email_canonicalizer');

        return $this->services['fos_user.user_manager'] = new \FOS\UserBundle\Entity\UserManager($this->get('security.encoder_factory'), $a, $a, $this->get('doctrine')->getEntityManager(NULL), 'Ology\\SocialBundle\\Entity\\User');
    }

    /**
     * Gets the 'fos_user.username_form_type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Form\Type\UsernameFormType A FOS\UserBundle\Form\Type\UsernameFormType instance.
     */
    protected function getFosUser_UsernameFormTypeService()
    {
        return $this->services['fos_user.username_form_type'] = new \FOS\UserBundle\Form\Type\UsernameFormType(new \FOS\UserBundle\Form\DataTransformer\UserToUsernameTransformer($this->get('fos_user.user_manager')));
    }

    /**
     * Gets the 'fos_user.util.email_canonicalizer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Util\Canonicalizer A FOS\UserBundle\Util\Canonicalizer instance.
     */
    protected function getFosUser_Util_EmailCanonicalizerService()
    {
        return $this->services['fos_user.util.email_canonicalizer'] = new \FOS\UserBundle\Util\Canonicalizer();
    }

    /**
     * Gets the 'fos_user.util.user_manipulator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Util\UserManipulator A FOS\UserBundle\Util\UserManipulator instance.
     */
    protected function getFosUser_Util_UserManipulatorService()
    {
        return $this->services['fos_user.util.user_manipulator'] = new \FOS\UserBundle\Util\UserManipulator($this->get('fos_user.user_manager'));
    }

    /**
     * Gets the 'fos_user.validator.password' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Validator\PasswordValidator A FOS\UserBundle\Validator\PasswordValidator instance.
     */
    protected function getFosUser_Validator_PasswordService()
    {
        $this->services['fos_user.validator.password'] = $instance = new \FOS\UserBundle\Validator\PasswordValidator();

        $instance->setEncoderFactory($this->get('security.encoder_factory'));

        return $instance;
    }

    /**
     * Gets the 'fos_user.validator.unique' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return FOS\UserBundle\Validator\UniqueValidator A FOS\UserBundle\Validator\UniqueValidator instance.
     */
    protected function getFosUser_Validator_UniqueService()
    {
        return $this->services['fos_user.validator.unique'] = new \FOS\UserBundle\Validator\UniqueValidator($this->get('fos_user.user_manager'));
    }

    /**
     * Gets the 'http_kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\HttpKernel A Symfony\Bundle\FrameworkBundle\HttpKernel instance.
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Bundle\FrameworkBundle\HttpKernel($this->get('event_dispatcher'), $this, new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, $this->get('controller_name_converter'), $this->get('monolog.logger.request')));
    }

    /**
     * Gets the 'jms_aop.interceptor_loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return JMS\AopBundle\Aop\InterceptorLoader A JMS\AopBundle\Aop\InterceptorLoader instance.
     */
    protected function getJmsAop_InterceptorLoaderService()
    {
        return $this->services['jms_aop.interceptor_loader'] = new \JMS\AopBundle\Aop\InterceptorLoader($this, array());
    }

    /**
     * Gets the 'jms_aop.pointcut_container' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return JMS\AopBundle\Aop\PointcutContainer A JMS\AopBundle\Aop\PointcutContainer instance.
     */
    protected function getJmsAop_PointcutContainerService()
    {
        return $this->services['jms_aop.pointcut_container'] = new \JMS\AopBundle\Aop\PointcutContainer(array());
    }

    /**
     * Gets the 'kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws \RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getKernelService()
    {
        throw new \RuntimeException('You have requested a synthetic service ("kernel"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'kernel.listener.ology.login' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\UserBundle\Listener\SecurityListener A Ology\UserBundle\Listener\SecurityListener instance.
     */
    protected function getKernel_Listener_Ology_LoginService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('kernel.listener.ology.login', 'request');
        }

        return $this->services['kernel.listener.ology.login'] = $this->scopedServices['request']['kernel.listener.ology.login'] = new \Ology\UserBundle\Listener\SecurityListener($this->get('router'), $this->get('security.context'), $this->get('request'), $this->get('session'));
    }

    /**
     * Gets the 'knp_zend_cache.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Zend\Cache\Manager A Zend\Cache\Manager instance.
     */
    protected function getKnpZendCache_ManagerService()
    {
        $this->services['knp_zend_cache.manager'] = $instance = new \Zend\Cache\Manager();

        $instance->setCacheTemplate('estrisa_twig_image_tag', array('frontend' => array('name' => 'Core', 'options' => array('lifetime' => 2592000, 'automatic_serialization' => true)), 'backend' => array('name' => 'File', 'options' => array('cache_dir' => '/var/www/ology4/app/cache/prod'))));

        return $instance;
    }

    /**
     * Gets the 'logger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getLoggerService()
    {
        $this->services['logger'] = $instance = new \Symfony\Bridge\Monolog\Logger('app');

        $instance->pushHandler($this->get('monolog.handler.main'));

        return $instance;
    }

    /**
     * Gets the 'mailer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Swift_Mailer A Swift_Mailer instance.
     */
    protected function getMailerService()
    {
        return $this->services['mailer'] = new \Swift_Mailer($this->get('swiftmailer.transport'));
    }

    /**
     * Gets the 'memcache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Memcache A Memcache instance.
     */
    protected function getMemcacheService()
    {
        $this->services['memcache'] = $instance = new \Memcache();

        $instance->addServer('localhost', '11211');

        return $instance;
    }

    /**
     * Gets the 'monolog.handler.main' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Monolog\Handler\FingersCrossedHandler A Monolog\Handler\FingersCrossedHandler instance.
     */
    protected function getMonolog_Handler_MainService()
    {
        return $this->services['monolog.handler.main'] = new \Monolog\Handler\FingersCrossedHandler($this->get('monolog.handler.nested'), 400, 0, true, true);
    }

    /**
     * Gets the 'monolog.handler.nested' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Monolog\Handler\StreamHandler A Monolog\Handler\StreamHandler instance.
     */
    protected function getMonolog_Handler_NestedService()
    {
        return $this->services['monolog.handler.nested'] = new \Monolog\Handler\StreamHandler('/var/www/ology4/app/logs/prod.log', 100, true);
    }

    /**
     * Gets the 'monolog.logger.doctrine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_DoctrineService()
    {
        $this->services['monolog.logger.doctrine'] = $instance = new \Symfony\Bridge\Monolog\Logger('doctrine');

        $instance->pushHandler($this->get('monolog.handler.main'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.elastica' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_ElasticaService()
    {
        $this->services['monolog.logger.elastica'] = $instance = new \Symfony\Bridge\Monolog\Logger('elastica');

        $instance->pushHandler($this->get('monolog.handler.main'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.event' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_EventService()
    {
        $this->services['monolog.logger.event'] = $instance = new \Symfony\Bridge\Monolog\Logger('event');

        $instance->pushHandler($this->get('monolog.handler.main'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_RequestService()
    {
        $this->services['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');

        $instance->pushHandler($this->get('monolog.handler.main'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_RouterService()
    {
        $this->services['monolog.logger.router'] = $instance = new \Symfony\Bridge\Monolog\Logger('router');

        $instance->pushHandler($this->get('monolog.handler.main'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.security' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_SecurityService()
    {
        $this->services['monolog.logger.security'] = $instance = new \Symfony\Bridge\Monolog\Logger('security');

        $instance->pushHandler($this->get('monolog.handler.main'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.snc_redis' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_SncRedisService()
    {
        $this->services['monolog.logger.snc_redis'] = $instance = new \Symfony\Bridge\Monolog\Logger('snc_redis');

        $instance->pushHandler($this->get('monolog.handler.main'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.templating' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance.
     */
    protected function getMonolog_Logger_TemplatingService()
    {
        $this->services['monolog.logger.templating'] = $instance = new \Symfony\Bridge\Monolog\Logger('templating');

        $instance->pushHandler($this->get('monolog.handler.main'));

        return $instance;
    }

    /**
     * Gets the 'my.facebook.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Security\User\Provider\FacebookProvider A Ology\SocialBundle\Security\User\Provider\FacebookProvider instance.
     */
    protected function getMy_Facebook_UserService()
    {
        return $this->services['my.facebook.user'] = new \Ology\SocialBundle\Security\User\Provider\FacebookProvider($this->get('fos_facebook.api'), $this->get('fos_user.user_manager'), $this->get('validator'), $this->get('social.dao.cache'), $this->get('social.dao.user'));
    }

    /**
     * Gets the 'my.twitter.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Security\User\Provider\TwitterProvider A Ology\SocialBundle\Security\User\Provider\TwitterProvider instance.
     */
    protected function getMy_Twitter_UserService()
    {
        return $this->services['my.twitter.user'] = new \Ology\SocialBundle\Security\User\Provider\TwitterProvider($this->get('fos_twitter.api'), $this->get('fos_user.user_manager'), $this->get('validator'), $this->get('session'), $this->get('social.dao.user'));
    }

    /**
     * Gets the 'ology.mailer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\UserBundle\Mailer\Mailer A Ology\UserBundle\Mailer\Mailer instance.
     */
    protected function getOlogy_MailerService()
    {
        return $this->services['ology.mailer'] = new \Ology\UserBundle\Mailer\Mailer($this->get('mailer'), $this->get('router'), $this->get('templating'), array('confirmation.template' => 'FOSUserBundle:Registration:email.txt.twig', 'resetting.template' => 'OlogyUserBundle:Resetting:email.txt.twig', 'from_email' => array('confirmation' => array('my@ology.com' => 'Ology Admin'), 'resetting' => array('my@ology.com' => 'Ology Admin'))), 'http://ology4.com');
    }

    /**
     * Gets the 'request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws \RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getRequestService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('request', 'request');
        }

        throw new \RuntimeException('You have requested a synthetic service ("request"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\HttpKernel\EventListener\ResponseListener A Symfony\Component\HttpKernel\EventListener\ResponseListener instance.
     */
    protected function getResponseListenerService()
    {
        return $this->services['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8');
    }

    /**
     * Gets the 'router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Routing\Router A Symfony\Bundle\FrameworkBundle\Routing\Router instance.
     */
    protected function getRouterService()
    {
        return $this->services['router'] = new \Symfony\Bundle\FrameworkBundle\Routing\Router($this, '/var/www/ology4/app/config/routing.yml', array('cache_dir' => '/var/www/ology4/app/cache/prod', 'debug' => true, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper', 'generator_cache_class' => 'appprodUrlGenerator', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper', 'matcher_cache_class' => 'appprodUrlMatcher'));
    }

    /**
     * Gets the 'router_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\EventListener\RouterListener A Symfony\Bundle\FrameworkBundle\EventListener\RouterListener instance.
     */
    protected function getRouterListenerService()
    {
        return $this->services['router_listener'] = new \Symfony\Bundle\FrameworkBundle\EventListener\RouterListener($this->get('router'), 80, 443, $this->get('monolog.logger.request'));
    }

    /**
     * Gets the 'routing.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader A Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader instance.
     */
    protected function getRouting_LoaderService()
    {
        $a = $this->get('file_locator');
        $b = $this->get('annotation_reader');

        $c = new \Sensio\Bundle\FrameworkExtraBundle\Routing\AnnotatedRouteControllerLoader($b);

        $d = new \Symfony\Component\Config\Loader\LoaderResolver();
        $d->addLoader(new \Symfony\Component\Routing\Loader\XmlFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\YamlFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\PhpFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\AnnotationDirectoryLoader($a, $c));
        $d->addLoader(new \Symfony\Component\Routing\Loader\AnnotationFileLoader($a, $c));
        $d->addLoader($c);

        return $this->services['routing.loader'] = new \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader($this->get('controller_name_converter'), $this->get('monolog.logger.router'), $d);
    }

    /**
     * Gets the 'security.access.method_interceptor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return JMS\SecurityExtraBundle\Security\Authorization\Interception\MethodSecurityInterceptor A JMS\SecurityExtraBundle\Security\Authorization\Interception\MethodSecurityInterceptor instance.
     */
    protected function getSecurity_Access_MethodInterceptorService()
    {
        return $this->services['security.access.method_interceptor'] = new \JMS\SecurityExtraBundle\Security\Authorization\Interception\MethodSecurityInterceptor($this->get('security.context'), $this->get('security.authentication.manager'), $this->get('security.access.decision_manager'), new \JMS\SecurityExtraBundle\Security\Authorization\AfterInvocation\AfterInvocationManager(array()), new \JMS\SecurityExtraBundle\Security\Authorization\RunAsManager('RunAsToken', 'ROLE_'), $this->get('logger'));
    }

    /**
     * Gets the 'security.context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Security\Core\SecurityContext A Symfony\Component\Security\Core\SecurityContext instance.
     */
    protected function getSecurity_ContextService()
    {
        return $this->services['security.context'] = new \Symfony\Component\Security\Core\SecurityContext($this->get('security.authentication.manager'), $this->get('security.access.decision_manager'), false);
    }

    /**
     * Gets the 'security.encoder_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Security\Core\Encoder\EncoderFactory A Symfony\Component\Security\Core\Encoder\EncoderFactory instance.
     */
    protected function getSecurity_EncoderFactoryService()
    {
        return $this->services['security.encoder_factory'] = new \Symfony\Component\Security\Core\Encoder\EncoderFactory(array('Symfony\\Component\\Security\\Core\\User\\User' => array('class' => 'Symfony\\Component\\Security\\Core\\Encoder\\PlaintextPasswordEncoder', 'arguments' => array(0 => false)), 'FOS\\UserBundle\\Model\\UserInterface' => array('class' => 'Ology\\SocialBundle\\Security\\MessageDigestPasswordEncoder', 'arguments' => array(0 => 'sha512', 1 => true, 2 => 5000))));
    }

    /**
     * Gets the 'security.extra.controller_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return JMS\SecurityExtraBundle\Controller\ControllerListener A JMS\SecurityExtraBundle\Controller\ControllerListener instance.
     */
    protected function getSecurity_Extra_ControllerListenerService()
    {
        return $this->services['security.extra.controller_listener'] = new \JMS\SecurityExtraBundle\Controller\ControllerListener($this, $this->get('annotation_reader'));
    }

    /**
     * Gets the 'security.firewall' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Security\Http\Firewall A Symfony\Component\Security\Http\Firewall instance.
     */
    protected function getSecurity_FirewallService()
    {
        return $this->services['security.firewall'] = new \Symfony\Component\Security\Http\Firewall(new \Symfony\Bundle\SecurityBundle\Security\FirewallMap($this, array('security.firewall.map.context.main' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/'))), $this->get('event_dispatcher'));
    }

    /**
     * Gets the 'security.firewall.map.context.main' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance.
     */
    protected function getSecurity_Firewall_Map_Context_MainService()
    {
        $a = $this->get('monolog.logger.security');
        $b = $this->get('security.context');
        $c = $this->get('my.facebook.user');
        $d = $this->get('my.twitter.user');
        $e = $this->get('fos_user.user_manager');
        $f = $this->get('event_dispatcher');
        $g = $this->get('router');
        $h = $this->get('security.authentication.manager');

        $i = new \Symfony\Component\HttpFoundation\RequestMatcher('^/login$');

        $j = new \Symfony\Component\HttpFoundation\RequestMatcher('^/register');

        $k = new \Symfony\Component\HttpFoundation\RequestMatcher('^/adm/post/publish$');

        $l = new \Symfony\Component\HttpFoundation\RequestMatcher('^/adm/cache/');

        $m = new \Symfony\Component\HttpFoundation\RequestMatcher('^/adm/mail/missyou$');

        $n = new \Symfony\Component\HttpFoundation\RequestMatcher('^/admhome');

        $o = new \Symfony\Component\HttpFoundation\RequestMatcher('^/adm');

        $p = new \Symfony\Component\HttpFoundation\RequestMatcher('^/editors');

        $q = new \Symfony\Component\HttpFoundation\RequestMatcher('^/stats');

        $r = new \Symfony\Component\HttpFoundation\RequestMatcher('/inbox');

        $s = new \Symfony\Component\HttpFoundation\RequestMatcher('/message');

        $t = new \Symfony\Component\HttpFoundation\RequestMatcher('/invite');

        $u = new \Symfony\Component\HttpFoundation\RequestMatcher('/settings');

        $v = new \Symfony\Component\HttpFoundation\RequestMatcher('/settings/fblikes');

        $w = new \Symfony\Component\HttpFoundation\RequestMatcher('/invite/');

        $x = new \Symfony\Component\HttpFoundation\RequestMatcher('/onboarding/');

        $y = new \Symfony\Component\HttpFoundation\RequestMatcher('/delete$');

        $z = new \Symfony\Component\HttpFoundation\RequestMatcher('/create$');

        $aa = new \Symfony\Component\HttpFoundation\RequestMatcher('/form$');

        $ba = new \Symfony\Component\HttpFoundation\RequestMatcher('/update$');

        $ca = new \Symfony\Component\HttpFoundation\RequestMatcher('/leave');

        $da = new \Symfony\Component\Security\Http\AccessMap();
        $da->add($i, array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $da->add($j, array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $da->add($k, array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $da->add($l, array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $da->add($m, array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $da->add($n, array(0 => 'ROLE_SUPER_ADMIN'), NULL);
        $da->add($o, array(0 => 'ROLE_SUPER_ADMIN'), NULL);
        $da->add($p, array(0 => 'ROLE_EDITOR'), NULL);
        $da->add($q, array(0 => 'ROLE_SUPER_ADMIN'), NULL);
        $da->add($r, array(0 => 'ROLE_USER'), NULL);
        $da->add($s, array(0 => 'ROLE_USER'), NULL);
        $da->add($t, array(0 => 'ROLE_USER'), NULL);
        $da->add($u, array(0 => 'ROLE_USER'), NULL);
        $da->add($v, array(0 => 'ROLE_USER'), NULL);
        $da->add($w, array(0 => 'ROLE_USER'), NULL);
        $da->add($x, array(0 => 'ROLE_USER'), NULL);
        $da->add($y, array(0 => 'ROLE_USER'), NULL);
        $da->add($z, array(0 => 'ROLE_USER'), NULL);
        $da->add($aa, array(0 => 'ROLE_USER'), NULL);
        $da->add($ba, array(0 => 'ROLE_USER'), NULL);
        $da->add($ca, array(0 => 'ROLE_USER'), NULL);

        $ea = new \Symfony\Component\Security\Http\HttpUtils($g);

        $fa = new \Symfony\Component\Security\Http\RememberMe\TokenBasedRememberMeServices(array(0 => $c, 1 => $d, 2 => $e), 'qwertyremember', 'main', array('lifetime' => 2592000, 'path' => '/', 'domain' => NULL, 'name' => 'REMEMBERME', 'secure' => false, 'httponly' => true, 'always_remember_me' => false, 'remember_me_parameter' => '_remember_me'), $a);

        $ga = new \Symfony\Component\Security\Http\Firewall\LogoutListener($b, $ea, '/logout', '/splash', NULL);
        $ga->addHandler(new \Symfony\Component\Security\Http\Logout\SessionLogoutHandler());
        $ga->addHandler(new \FOS\FacebookBundle\Security\Logout\FacebookHandler($this->get('fos_facebook.api')));
        $ga->addHandler($fa);

        $ha = new \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy('migrate');

        $ia = new \FOS\FacebookBundle\Security\Firewall\FacebookListener($b, $h, $ha, $ea, 'main', array('check_path' => '/facebook/check', 'login_path' => '/splash', 'default_target_path' => '/facebook/redirect', 'app_url' => 'http://apps.facebook.com/appName/ology_dev', 'server_url' => 'http://ology4.com', 'use_forward' => false, 'always_use_default_target_path' => false, 'target_path_parameter' => '_target_path', 'use_referer' => false, 'failure_path' => NULL, 'failure_forward' => false, 'display' => 'page', 'create_user_if_not_exists' => false), NULL, NULL, $a, $f);
        $ia->setRememberMeServices($fa);

        $ja = new \FOS\TwitterBundle\Security\Firewall\TwitterListener($b, $h, $ha, $ea, 'main', array('check_path' => '/twitter/check', 'login_path' => '/splash', 'default_target_path' => '/twitter/redirect', 'use_forward' => false, 'always_use_default_target_path' => false, 'target_path_parameter' => '_target_path', 'use_referer' => false, 'failure_path' => NULL, 'failure_forward' => false, 'use_twitter_anywhere' => false), NULL, NULL, $a, $f);
        $ja->setRememberMeServices($fa);

        $ka = new \Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener($b, $h, $ha, $ea, 'main', array('check_path' => '/login_check', 'login_path' => '/splash', 'default_target_path' => '/login/redirect', 'use_forward' => false, 'always_use_default_target_path' => false, 'target_path_parameter' => '_target_path', 'use_referer' => false, 'failure_path' => NULL, 'failure_forward' => false, 'username_parameter' => '_username', 'password_parameter' => '_password', 'csrf_parameter' => '_csrf_token', 'intention' => 'authenticate', 'post_only' => true), NULL, NULL, $a, $f);
        $ka->setRememberMeServices($fa);

        return $this->services['security.firewall.map.context.main'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => new \Symfony\Component\Security\Http\Firewall\ChannelListener($da, new \Symfony\Component\Security\Http\EntryPoint\RetryAuthenticationEntryPoint(), $a), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($b, array(0 => $c, 1 => $d, 2 => $e), 'main', $a, $f), 2 => $ga, 3 => $ia, 4 => $ja, 5 => $ka, 6 => new \Symfony\Component\Security\Http\Firewall\RememberMeListener($b, $fa, $h, $a, $f), 7 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($b, '4fdb95c248fa9', $a), 8 => new \Symfony\Component\Security\Http\Firewall\AccessListener($b, $this->get('security.access.decision_manager'), $da, $h, $a)), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($b, $this->get('security.authentication.trust_resolver'), $ea, new \Symfony\Component\Security\Http\EntryPoint\FormAuthenticationEntryPoint($this->get('http_kernel'), $ea, '/splash', false), NULL, NULL, $a));
    }

    /**
     * Gets the 'security.rememberme.response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\SecurityBundle\EventListener\ResponseListener A Symfony\Bundle\SecurityBundle\EventListener\ResponseListener instance.
     */
    protected function getSecurity_Rememberme_ResponseListenerService()
    {
        return $this->services['security.rememberme.response_listener'] = new \Symfony\Bundle\SecurityBundle\EventListener\ResponseListener();
    }

    /**
     * Gets the 'sensio_framework_extra.cache.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Sensio\Bundle\FrameworkExtraBundle\EventListener\CacheListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\CacheListener instance.
     */
    protected function getSensioFrameworkExtra_Cache_ListenerService()
    {
        return $this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\CacheListener();
    }

    /**
     * Gets the 'sensio_framework_extra.controller.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener instance.
     */
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->services['sensio_framework_extra.controller.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener($this->get('annotation_reader'));
    }

    /**
     * Gets the 'sensio_framework_extra.converter.doctrine.orm' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter A Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter instance.
     */
    protected function getSensioFrameworkExtra_Converter_Doctrine_OrmService()
    {
        return $this->services['sensio_framework_extra.converter.doctrine.orm'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter($this->get('doctrine'));
    }

    /**
     * Gets the 'sensio_framework_extra.converter.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener instance.
     */
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        return $this->services['sensio_framework_extra.converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener($this->get('sensio_framework_extra.converter.manager'));
    }

    /**
     * Gets the 'sensio_framework_extra.converter.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager A Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager instance.
     */
    protected function getSensioFrameworkExtra_Converter_ManagerService()
    {
        $this->services['sensio_framework_extra.converter.manager'] = $instance = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager();

        $instance->add($this->get('sensio_framework_extra.converter.doctrine.orm'), 0);

        return $instance;
    }

    /**
     * Gets the 'sensio_framework_extra.view.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener instance.
     */
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        return $this->services['sensio_framework_extra.view.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener($this);
    }

    /**
     * Gets the 'service_container' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws \RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getServiceContainerService()
    {
        throw new \RuntimeException('You have requested a synthetic service ("service_container"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'session' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\HttpFoundation\Session A Symfony\Component\HttpFoundation\Session instance.
     */
    protected function getSessionService()
    {
        return $this->services['session'] = new \Symfony\Component\HttpFoundation\Session($this->get('snc_redis.session.storage'), 'en');
    }

    /**
     * Gets the 'session_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\EventListener\SessionListener A Symfony\Bundle\FrameworkBundle\EventListener\SessionListener instance.
     */
    protected function getSessionListenerService()
    {
        return $this->services['session_listener'] = new \Symfony\Bundle\FrameworkBundle\EventListener\SessionListener($this, true);
    }

    /**
     * Gets the 'snc_redis.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Predis\Client A Predis\Client instance.
     */
    protected function getSncRedis_DefaultService()
    {
        return $this->services['snc_redis.default'] = new \Predis\Client(new \Predis\ConnectionParameters(array('profile' => '2.4', 'connection_async' => false, 'connection_persistent' => false, 'connection_timeout' => 5, 'read_write_timeout' => NULL, 'iterable_multibulk' => false, 'throw_errors' => true, 'cluster' => NULL, 'logging' => true, 'alias' => 'default', 'scheme' => 'tcp', 'host' => 'localhost', 'port' => 6379, 'database' => 0, 'password' => NULL, 'weight' => NULL)), new \Predis\Options\ClientOptions(array('profile' => '2.4', 'connection_async' => false, 'connection_persistent' => false, 'connection_timeout' => 5, 'read_write_timeout' => NULL, 'iterable_multibulk' => false, 'throw_errors' => true, 'connections' => $this->get('snc_redis.connectionfactory'))));
    }

    /**
     * Gets the 'snc_redis.logger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Snc\RedisBundle\Logger\RedisLogger A Snc\RedisBundle\Logger\RedisLogger instance.
     */
    protected function getSncRedis_LoggerService()
    {
        return $this->services['snc_redis.logger'] = new \Snc\RedisBundle\Logger\RedisLogger($this->get('monolog.logger.snc_redis'));
    }

    /**
     * Gets the 'snc_redis.session' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Predis\Client A Predis\Client instance.
     */
    protected function getSncRedis_SessionService()
    {
        return $this->services['snc_redis.session'] = new \Predis\Client(new \Predis\ConnectionParameters(array('profile' => '2.4', 'connection_async' => false, 'connection_persistent' => false, 'connection_timeout' => 5, 'read_write_timeout' => NULL, 'iterable_multibulk' => false, 'throw_errors' => true, 'cluster' => NULL, 'logging' => true, 'alias' => 'session', 'scheme' => 'tcp', 'host' => 'localhost', 'port' => 6379, 'database' => 1, 'password' => NULL, 'weight' => NULL)), new \Predis\Options\ClientOptions(array('profile' => '2.4', 'connection_async' => false, 'connection_persistent' => false, 'connection_timeout' => 5, 'read_write_timeout' => NULL, 'iterable_multibulk' => false, 'throw_errors' => true, 'connections' => $this->get('snc_redis.connectionfactory'))));
    }

    /**
     * Gets the 'snc_redis.session.storage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Snc\RedisBundle\SessionStorage\RedisSessionStorage A Snc\RedisBundle\SessionStorage\RedisSessionStorage instance.
     */
    protected function getSncRedis_Session_StorageService()
    {
        return $this->services['snc_redis.session.storage'] = new \Snc\RedisBundle\SessionStorage\RedisSessionStorage($this->get('snc_redis.session'), array('lifetime' => 604800), 'session');
    }

    /**
     * Gets the 'social.cache.channel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Cache\ChannelCache A Ology\SocialBundle\Cache\ChannelCache instance.
     */
    protected function getSocial_Cache_ChannelService()
    {
        return $this->services['social.cache.channel'] = new \Ology\SocialBundle\Cache\ChannelCache($this->get('doctrine.orm.default_entity_manager'), $this->get('snc_redis.default'), $this->get('doctrine.dbal.default_connection'));
    }

    /**
     * Gets the 'social.cache.ology' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Cache\OlogyCache A Ology\SocialBundle\Cache\OlogyCache instance.
     */
    protected function getSocial_Cache_OlogyService()
    {
        return $this->services['social.cache.ology'] = new \Ology\SocialBundle\Cache\OlogyCache($this->get('doctrine.orm.default_entity_manager'), $this->get('snc_redis.default'), $this->get('doctrine.dbal.default_connection'));
    }

    /**
     * Gets the 'social.cache.post' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Cache\PostCache A Ology\SocialBundle\Cache\PostCache instance.
     */
    protected function getSocial_Cache_PostService()
    {
        return $this->services['social.cache.post'] = new \Ology\SocialBundle\Cache\PostCache($this->get('doctrine.orm.default_entity_manager'), $this->get('snc_redis.default'), $this->get('doctrine.dbal.default_connection'));
    }

    /**
     * Gets the 'social.cache.splash' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Cache\SplashCache A Ology\SocialBundle\Cache\SplashCache instance.
     */
    protected function getSocial_Cache_SplashService()
    {
        return $this->services['social.cache.splash'] = new \Ology\SocialBundle\Cache\SplashCache($this->get('doctrine.orm.default_entity_manager'), $this->get('snc_redis.default'), $this->get('doctrine.dbal.default_connection'));
    }

    /**
     * Gets the 'social.cache.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Cache\UserCache A Ology\SocialBundle\Cache\UserCache instance.
     */
    protected function getSocial_Cache_UserService()
    {
        return $this->services['social.cache.user'] = new \Ology\SocialBundle\Cache\UserCache($this->get('doctrine.orm.default_entity_manager'), $this->get('snc_redis.default'), $this->get('doctrine.dbal.default_connection'));
    }

    /**
     * Gets the 'social.dao.cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO A Ology\SocialBundle\DAO\CacheDAO instance.
     */
    protected function getSocial_Dao_CacheService()
    {
        return $this->services['social.dao.cache'] = new \Ology\SocialBundle\DAO\CacheDAO($this->get('doctrine.orm.default_entity_manager'), $this->get('snc_redis.default'), $this->get('doctrine.dbal.default_connection'), $this->get('social.dao.cache.postsstashes'), $this->get('social.dao.cache.postsologies'), $this->get('social.dao.cache.postschannels'), $this->get('social.dao.cache.user'), $this->get('social.dao.cache.likes'));
    }

    /**
     * Gets the 'social.dao.cache.followuser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO\FollowUserCacheDAO A Ology\SocialBundle\DAO\CacheDAO\FollowUserCacheDAO instance.
     */
    protected function getSocial_Dao_Cache_FollowuserService()
    {
        return $this->services['social.dao.cache.followuser'] = new \Ology\SocialBundle\DAO\CacheDAO\FollowUserCacheDAO($this->get('snc_redis.default'));
    }

    /**
     * Gets the 'social.dao.cache.likes' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO\LikesCacheDAO A Ology\SocialBundle\DAO\CacheDAO\LikesCacheDAO instance.
     */
    protected function getSocial_Dao_Cache_LikesService()
    {
        return $this->services['social.dao.cache.likes'] = new \Ology\SocialBundle\DAO\CacheDAO\LikesCacheDAO($this->get('snc_redis.default'));
    }

    /**
     * Gets the 'social.dao.cache.notif' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO\NotificationCacheDAO A Ology\SocialBundle\DAO\CacheDAO\NotificationCacheDAO instance.
     */
    protected function getSocial_Dao_Cache_NotifService()
    {
        return $this->services['social.dao.cache.notif'] = new \Ology\SocialBundle\DAO\CacheDAO\NotificationCacheDAO($this->get('snc_redis.default'));
    }

    /**
     * Gets the 'social.dao.cache.page' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO\PageCacheDAO A Ology\SocialBundle\DAO\CacheDAO\PageCacheDAO instance.
     */
    protected function getSocial_Dao_Cache_PageService()
    {
        return $this->services['social.dao.cache.page'] = new \Ology\SocialBundle\DAO\CacheDAO\PageCacheDAO($this->get('memcache'));
    }

    /**
     * Gets the 'social.dao.cache.post' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO\PostCacheDAO A Ology\SocialBundle\DAO\CacheDAO\PostCacheDAO instance.
     */
    protected function getSocial_Dao_Cache_PostService()
    {
        return $this->services['social.dao.cache.post'] = new \Ology\SocialBundle\DAO\CacheDAO\PostCacheDAO($this->get('snc_redis.default'));
    }

    /**
     * Gets the 'social.dao.cache.postschannels' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO\PostsChannelsCacheDAO A Ology\SocialBundle\DAO\CacheDAO\PostsChannelsCacheDAO instance.
     */
    protected function getSocial_Dao_Cache_PostschannelsService()
    {
        return $this->services['social.dao.cache.postschannels'] = new \Ology\SocialBundle\DAO\CacheDAO\PostsChannelsCacheDAO($this->get('snc_redis.default'), $this->get('social.dao.post'));
    }

    /**
     * Gets the 'social.dao.cache.postsologies' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO\PostsOlogiesCacheDAO A Ology\SocialBundle\DAO\CacheDAO\PostsOlogiesCacheDAO instance.
     */
    protected function getSocial_Dao_Cache_PostsologiesService()
    {
        return $this->services['social.dao.cache.postsologies'] = new \Ology\SocialBundle\DAO\CacheDAO\PostsOlogiesCacheDAO($this->get('snc_redis.default'), $this->get('social.dao.post'));
    }

    /**
     * Gets the 'social.dao.cache.postsstashes' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO\PostsStashesCacheDAO A Ology\SocialBundle\DAO\CacheDAO\PostsStashesCacheDAO instance.
     */
    protected function getSocial_Dao_Cache_PostsstashesService()
    {
        return $this->services['social.dao.cache.postsstashes'] = new \Ology\SocialBundle\DAO\CacheDAO\PostsStashesCacheDAO($this->get('snc_redis.default'), $this->get('social.dao.post'));
    }

    /**
     * Gets the 'social.dao.cache.stash' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO\StashCacheDAO A Ology\SocialBundle\DAO\CacheDAO\StashCacheDAO instance.
     */
    protected function getSocial_Dao_Cache_StashService()
    {
        return $this->services['social.dao.cache.stash'] = new \Ology\SocialBundle\DAO\CacheDAO\StashCacheDAO($this->get('snc_redis.default'));
    }

    /**
     * Gets the 'social.dao.cache.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CacheDAO\UserCacheDAO A Ology\SocialBundle\DAO\CacheDAO\UserCacheDAO instance.
     */
    protected function getSocial_Dao_Cache_UserService()
    {
        return $this->services['social.dao.cache.user'] = new \Ology\SocialBundle\DAO\CacheDAO\UserCacheDAO($this->get('snc_redis.default'));
    }

    /**
     * Gets the 'social.dao.channel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\ChannelDAO A Ology\SocialBundle\DAO\ChannelDAO instance.
     */
    protected function getSocial_Dao_ChannelService()
    {
        return $this->services['social.dao.channel'] = new \Ology\SocialBundle\DAO\ChannelDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.comment' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\CommentDAO A Ology\SocialBundle\DAO\CommentDAO instance.
     */
    protected function getSocial_Dao_CommentService()
    {
        return $this->services['social.dao.comment'] = new \Ology\SocialBundle\DAO\CommentDAO($this->get('doctrine.orm.default_entity_manager'), $this->get('social.dao.notification'));
    }

    /**
     * Gets the 'social.dao.following' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\FollowingDAO A Ology\SocialBundle\DAO\FollowingDAO instance.
     */
    protected function getSocial_Dao_FollowingService()
    {
        return $this->services['social.dao.following'] = new \Ology\SocialBundle\DAO\FollowingDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.inbox' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\InboxDAO A Ology\SocialBundle\DAO\InboxDAO instance.
     */
    protected function getSocial_Dao_InboxService()
    {
        return $this->services['social.dao.inbox'] = new \Ology\SocialBundle\DAO\InboxDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.invite' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\InviteDAO A Ology\SocialBundle\DAO\InviteDAO instance.
     */
    protected function getSocial_Dao_InviteService()
    {
        return $this->services['social.dao.invite'] = new \Ology\SocialBundle\DAO\InviteDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.label' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\LabelDAO A Ology\SocialBundle\DAO\LabelDAO instance.
     */
    protected function getSocial_Dao_LabelService()
    {
        return $this->services['social.dao.label'] = new \Ology\SocialBundle\DAO\LabelDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.labelology' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\LabelOlogyDAO A Ology\SocialBundle\DAO\LabelOlogyDAO instance.
     */
    protected function getSocial_Dao_LabelologyService()
    {
        return $this->services['social.dao.labelology'] = new \Ology\SocialBundle\DAO\LabelOlogyDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.likes' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\LikesDAO A Ology\SocialBundle\DAO\LikesDAO instance.
     */
    protected function getSocial_Dao_LikesService()
    {
        return $this->services['social.dao.likes'] = new \Ology\SocialBundle\DAO\LikesDAO($this->get('doctrine.orm.default_entity_manager'), $this->get('social.service.user'), $this->get('social.dao.cache.likes'));
    }

    /**
     * Gets the 'social.dao.membership' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\MembershipDAO A Ology\SocialBundle\DAO\MembershipDAO instance.
     */
    protected function getSocial_Dao_MembershipService()
    {
        return $this->services['social.dao.membership'] = new \Ology\SocialBundle\DAO\MembershipDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.mergeaccount' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\MergeAccountDAO A Ology\SocialBundle\DAO\MergeAccountDAO instance.
     */
    protected function getSocial_Dao_MergeaccountService()
    {
        return $this->services['social.dao.mergeaccount'] = new \Ology\SocialBundle\DAO\MergeAccountDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.message' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\MessageDAO A Ology\SocialBundle\DAO\MessageDAO instance.
     */
    protected function getSocial_Dao_MessageService()
    {
        return $this->services['social.dao.message'] = new \Ology\SocialBundle\DAO\MessageDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.notification' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\NotificationDAO A Ology\SocialBundle\DAO\NotificationDAO instance.
     */
    protected function getSocial_Dao_NotificationService()
    {
        return $this->services['social.dao.notification'] = new \Ology\SocialBundle\DAO\NotificationDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.ology' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\OlogyDAO A Ology\SocialBundle\DAO\OlogyDAO instance.
     */
    protected function getSocial_Dao_OlogyService()
    {
        return $this->services['social.dao.ology'] = new \Ology\SocialBundle\DAO\OlogyDAO($this->get('doctrine.orm.default_entity_manager'), $this->get('snc_redis.default'), $this->get('social.cache.ology'), $this);
    }

    /**
     * Gets the 'social.dao.post' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\PostDAO A Ology\SocialBundle\DAO\PostDAO instance.
     */
    protected function getSocial_Dao_PostService()
    {
        return $this->services['social.dao.post'] = new \Ology\SocialBundle\DAO\PostDAO($this->get('social.cache.post'), $this->get('social.dao.cache.post'), $this->get('social.cache.splash'), $this->get('doctrine.orm.default_entity_manager'), $this);
    }

    /**
     * Gets the 'social.dao.postschannels' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\PostsChannelsDAO A Ology\SocialBundle\DAO\PostsChannelsDAO instance.
     */
    protected function getSocial_Dao_PostschannelsService()
    {
        return $this->services['social.dao.postschannels'] = new \Ology\SocialBundle\DAO\PostsChannelsDAO($this->get('social.cache.channel'), $this->get('social.dao.cache.postschannels'), $this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.postsologies' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\PostsOlogiesDAO A Ology\SocialBundle\DAO\PostsOlogiesDAO instance.
     */
    protected function getSocial_Dao_PostsologiesService()
    {
        return $this->services['social.dao.postsologies'] = new \Ology\SocialBundle\DAO\PostsOlogiesDAO($this->get('social.dao.cache.postsologies'), $this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.postsstashes' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\PostsStashesDAO A Ology\SocialBundle\DAO\PostsStashesDAO instance.
     */
    protected function getSocial_Dao_PostsstashesService()
    {
        return $this->services['social.dao.postsstashes'] = new \Ology\SocialBundle\DAO\PostsStashesDAO($this->get('doctrine.orm.default_entity_manager'), $this->get('social.dao.cache.postsStashes'));
    }

    /**
     * Gets the 'social.dao.sponsor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\SponsorDAO A Ology\SocialBundle\DAO\SponsorDAO instance.
     */
    protected function getSocial_Dao_SponsorService()
    {
        return $this->services['social.dao.sponsor'] = new \Ology\SocialBundle\DAO\SponsorDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.stash' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\StashDAO A Ology\SocialBundle\DAO\StashDAO instance.
     */
    protected function getSocial_Dao_StashService()
    {
        return $this->services['social.dao.stash'] = new \Ology\SocialBundle\DAO\StashDAO($this->get('doctrine.orm.default_entity_manager'), $this->get('social.dao.cache.stash'));
    }

    /**
     * Gets the 'social.dao.stats' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\StatsDAO A Ology\SocialBundle\DAO\StatsDAO instance.
     */
    protected function getSocial_Dao_StatsService()
    {
        return $this->services['social.dao.stats'] = new \Ology\SocialBundle\DAO\StatsDAO($this->get('doctrine.orm.default_entity_manager'), $this->get('snc_redis.default'), $this->get('doctrine.dbal.default_connection'));
    }

    /**
     * Gets the 'social.dao.subscription' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\SubscriptionDAO A Ology\SocialBundle\DAO\SubscriptionDAO instance.
     */
    protected function getSocial_Dao_SubscriptionService()
    {
        return $this->services['social.dao.subscription'] = new \Ology\SocialBundle\DAO\SubscriptionDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.tag' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\TagDAO A Ology\SocialBundle\DAO\TagDAO instance.
     */
    protected function getSocial_Dao_TagService()
    {
        return $this->services['social.dao.tag'] = new \Ology\SocialBundle\DAO\TagDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.tagstash' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\TagStashDAO A Ology\SocialBundle\DAO\TagStashDAO instance.
     */
    protected function getSocial_Dao_TagstashService()
    {
        return $this->services['social.dao.tagstash'] = new \Ology\SocialBundle\DAO\TagStashDAO($this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.dao.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\DAO\UserDAO A Ology\SocialBundle\DAO\UserDAO instance.
     */
    protected function getSocial_Dao_UserService()
    {
        return $this->services['social.dao.user'] = new \Ology\SocialBundle\DAO\UserDAO($this->get('doctrine.orm.default_entity_manager'), $this->get('fos_user.user_manager'), $this, $this->get('social.dao.cache.user'), $this->get('social.cache.user'));
    }

    /**
     * Gets the 'social.registration.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\UserBundle\Form\Type\RegistrationFormType A Ology\UserBundle\Form\Type\RegistrationFormType instance.
     */
    protected function getSocial_Registration_Form_TypeService()
    {
        return $this->services['social.registration.form.type'] = new \Ology\UserBundle\Form\Type\RegistrationFormType('Ology\\SocialBundle\\Entity\\User');
    }

    /**
     * Gets the 'social.resetting.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\UserBundle\Form\Type\ResettingFormType A Ology\UserBundle\Form\Type\ResettingFormType instance.
     */
    protected function getSocial_Resetting_Form_TypeService()
    {
        return $this->services['social.resetting.form.type'] = new \Ology\UserBundle\Form\Type\ResettingFormType();
    }

    /**
     * Gets the 'social.service.appmanager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\ApplicationManagerService A Ology\SocialBundle\Service\ApplicationManagerService instance.
     */
    protected function getSocial_Service_AppmanagerService()
    {
        return $this->services['social.service.appmanager'] = new \Ology\SocialBundle\Service\ApplicationManagerService($this->get('social.service.ology'), $this->get('social.service.post'), $this->get('social.service.comment'), $this->get('social.service.notification'), $this->get('social.service.membership'));
    }

    /**
     * Gets the 'social.service.cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\CacheService A Ology\SocialBundle\Service\CacheService instance.
     */
    protected function getSocial_Service_CacheService()
    {
        return $this->services['social.service.cache'] = new \Ology\SocialBundle\Service\CacheService($this->get('social.dao.cache'), $this->get('social.dao.ology'));
    }

    /**
     * Gets the 'social.service.channel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\ChannelService A Ology\SocialBundle\Service\ChannelService instance.
     */
    protected function getSocial_Service_ChannelService()
    {
        return $this->services['social.service.channel'] = new \Ology\SocialBundle\Service\ChannelService($this->get('social.dao.channel'), $this->get('social.dao.postschannels'));
    }

    /**
     * Gets the 'social.service.comment' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\CommentService A Ology\SocialBundle\Service\CommentService instance.
     */
    protected function getSocial_Service_CommentService()
    {
        return $this->services['social.service.comment'] = new \Ology\SocialBundle\Service\CommentService($this->get('social.dao.comment'), $this->get('social.dao.cache'), $this->get('social.service.mail'), '10;');
    }

    /**
     * Gets the 'social.service.follow' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\FollowService A Ology\SocialBundle\Service\FollowService instance.
     */
    protected function getSocial_Service_FollowService()
    {
        return $this->services['social.service.follow'] = new \Ology\SocialBundle\Service\FollowService($this->get('social.dao.cache.followuser'), $this->get('social.service.stash'), $this->get('social.service.ology'), $this->get('social.service.user'), $this->get('social.service.membership'), $this->get('social.service.notification'), $this->get('social.service.mail'));
    }

    /**
     * Gets the 'social.service.inbox' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\InboxService A Ology\SocialBundle\Service\InboxService instance.
     */
    protected function getSocial_Service_InboxService()
    {
        return $this->services['social.service.inbox'] = new \Ology\SocialBundle\Service\InboxService($this->get('social.dao.inbox'));
    }

    /**
     * Gets the 'social.service.invite' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\InviteService A Ology\SocialBundle\Service\InviteService instance.
     */
    protected function getSocial_Service_InviteService()
    {
        return $this->services['social.service.invite'] = new \Ology\SocialBundle\Service\InviteService($this->get('social.dao.invite'), $this->get('social.service.mail'));
    }

    /**
     * Gets the 'social.service.label' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\LabelService A Ology\SocialBundle\Service\LabelService instance.
     */
    protected function getSocial_Service_LabelService()
    {
        return $this->services['social.service.label'] = new \Ology\SocialBundle\Service\LabelService($this->get('social.dao.label'));
    }

    /**
     * Gets the 'social.service.labelology' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\LabelOlogyService A Ology\SocialBundle\Service\LabelOlogyService instance.
     */
    protected function getSocial_Service_LabelologyService()
    {
        return $this->services['social.service.labelology'] = new \Ology\SocialBundle\Service\LabelOlogyService($this->get('social.dao.labelology'), $this->get('social.dao.label'));
    }

    /**
     * Gets the 'social.service.likes' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\LikesService A Ology\SocialBundle\Service\LikesService instance.
     */
    protected function getSocial_Service_LikesService()
    {
        return $this->services['social.service.likes'] = new \Ology\SocialBundle\Service\LikesService($this->get('social.dao.likes'), $this->get('social.dao.cache'), $this->get('social.service.user'));
    }

    /**
     * Gets the 'social.service.mail' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\EmailService A Ology\SocialBundle\Service\EmailService instance.
     */
    protected function getSocial_Service_MailService()
    {
        return $this->services['social.service.mail'] = new \Ology\SocialBundle\Service\EmailService('http://ology4.com', $this->get('mailer'), $this->get('templating'));
    }

    /**
     * Gets the 'social.service.membership' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\MembershipService A Ology\SocialBundle\Service\MembershipService instance.
     */
    protected function getSocial_Service_MembershipService()
    {
        return $this->services['social.service.membership'] = new \Ology\SocialBundle\Service\MembershipService($this->get('social.dao.membership'), $this->get('social.dao.cache'), $this->get('social.service.mail'), $this->get('social.dao.user'), $this->get('social.dao.ology'), $this->get('social.dao.stats'));
    }

    /**
     * Gets the 'social.service.merge' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\MergeService A Ology\SocialBundle\Service\MergeService instance.
     */
    protected function getSocial_Service_MergeService()
    {
        return $this->services['social.service.merge'] = new \Ology\SocialBundle\Service\MergeService($this->get('doctrine.orm.default_entity_manager'), $this->get('social.service.user'), $this->get('social.service.cache'), $this->get('social.service.follow'), $this->get('social.dao.mergeaccount'));
    }

    /**
     * Gets the 'social.service.message' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\MessageService A Ology\SocialBundle\Service\MessageService instance.
     */
    protected function getSocial_Service_MessageService()
    {
        return $this->services['social.service.message'] = new \Ology\SocialBundle\Service\MessageService($this->get('social.dao.message'));
    }

    /**
     * Gets the 'social.service.notif' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\NotifService A Ology\SocialBundle\Service\NotifService instance.
     */
    protected function getSocial_Service_NotifService()
    {
        return $this->services['social.service.notif'] = new \Ology\SocialBundle\Service\NotifService($this->get('social.dao.cache.notif'));
    }

    /**
     * Gets the 'social.service.notification' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\NotificationService A Ology\SocialBundle\Service\NotificationService instance.
     */
    protected function getSocial_Service_NotificationService()
    {
        return $this->services['social.service.notification'] = new \Ology\SocialBundle\Service\NotificationService($this->get('social.dao.notification'), $this->get('social.dao.cache'), $this->get('social.service.ology'), $this->get('social.service.post'), $this->get('social.service.comment'), $this->get('social.service.user'), $this->get('social.service.membership'), $this->get('social.service.stash'));
    }

    /**
     * Gets the 'social.service.ology' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\OlogyService A Ology\SocialBundle\Service\OlogyService instance.
     */
    protected function getSocial_Service_OlogyService()
    {
        return $this->services['social.service.ology'] = new \Ology\SocialBundle\Service\OlogyService($this->get('social.dao.ology'), $this->get('social.service.membership'), $this->get('social.service.post'), $this->get('social.service.labelology'), $this->get('social.dao.cache'));
    }

    /**
     * Gets the 'social.service.post' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\PostService A Ology\SocialBundle\Service\PostService instance.
     */
    protected function getSocial_Service_PostService()
    {
        return $this->services['social.service.post'] = new \Ology\SocialBundle\Service\PostService($this->get('social.dao.post'), $this->get('social.dao.ology'), $this->get('social.dao.user'), $this->get('social.dao.postsologies'), $this->get('social.dao.postschannels'), $this->get('social.dao.postsstashes'), $this->get('social.dao.cache'), $this->get('social.service.comment'), $this->get('social.service.mail'));
    }

    /**
     * Gets the 'social.service.search' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\SearchService A Ology\SocialBundle\Service\SearchService instance.
     */
    protected function getSocial_Service_SearchService()
    {
        $a = $this->get('foq_elastica.finder.website.ology');

        return $this->services['social.service.search'] = new \Ology\SocialBundle\Service\SearchService($a, $a, $a);
    }

    /**
     * Gets the 'social.service.sponsor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\SponsorService A Ology\SocialBundle\Service\SponsorService instance.
     */
    protected function getSocial_Service_SponsorService()
    {
        return $this->services['social.service.sponsor'] = new \Ology\SocialBundle\Service\SponsorService($this->get('social.dao.sponsor'));
    }

    /**
     * Gets the 'social.service.stash' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\StashService A Ology\SocialBundle\Service\StashService instance.
     */
    protected function getSocial_Service_StashService()
    {
        return $this->services['social.service.stash'] = new \Ology\SocialBundle\Service\StashService($this->get('social.dao.stash'), $this->get('social.dao.postsstashes'), $this->get('social.dao.tagstash'), $this->get('social.service.tag'));
    }

    /**
     * Gets the 'social.service.stats' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\StatsService A Ology\SocialBundle\Service\StatsService instance.
     */
    protected function getSocial_Service_StatsService()
    {
        return $this->services['social.service.stats'] = new \Ology\SocialBundle\Service\StatsService($this->get('social.dao.stats'), $this->get('social.service.stash'), $this->get('social.service.follow'), $this->get('social.service.user'));
    }

    /**
     * Gets the 'social.service.subscription' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\SubscriptionService A Ology\SocialBundle\Service\SubscriptionService instance.
     */
    protected function getSocial_Service_SubscriptionService()
    {
        return $this->services['social.service.subscription'] = new \Ology\SocialBundle\Service\SubscriptionService($this->get('social.dao.subscription'), $this->get('social.dao.cache'), $this->get('social.service.mail'), $this->get('social.dao.user'), $this->get('social.dao.channel'));
    }

    /**
     * Gets the 'social.service.tag' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\TagService A Ology\SocialBundle\Service\TagService instance.
     */
    protected function getSocial_Service_TagService()
    {
        return $this->services['social.service.tag'] = new \Ology\SocialBundle\Service\TagService($this->get('social.dao.tag'), $this->get('social.dao.tagstash'));
    }

    /**
     * Gets the 'social.service.tips' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\TipsPromptService A Ology\SocialBundle\Service\TipsPromptService instance.
     */
    protected function getSocial_Service_TipsService()
    {
        return $this->services['social.service.tips'] = new \Ology\SocialBundle\Service\TipsPromptService($this->get('security.context'), $this->get('doctrine.orm.default_entity_manager'));
    }

    /**
     * Gets the 'social.service.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Ology\SocialBundle\Service\UserService A Ology\SocialBundle\Service\UserService instance.
     */
    protected function getSocial_Service_UserService()
    {
        return $this->services['social.service.user'] = new \Ology\SocialBundle\Service\UserService($this->get('social.dao.user'), $this->get('social.dao.cache'), $this->get('social.service.mail'));
    }

    /**
     * Gets the 'swiftmailer.plugin.messagelogger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\SwiftmailerBundle\Logger\MessageLogger A Symfony\Bundle\SwiftmailerBundle\Logger\MessageLogger instance.
     */
    protected function getSwiftmailer_Plugin_MessageloggerService()
    {
        return $this->services['swiftmailer.plugin.messagelogger'] = new \Symfony\Bundle\SwiftmailerBundle\Logger\MessageLogger();
    }

    /**
     * Gets the 'swiftmailer.spool' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Swift_FileSpool A Swift_FileSpool instance.
     */
    protected function getSwiftmailer_SpoolService()
    {
        return $this->services['swiftmailer.spool'] = new \Swift_FileSpool('/var/www/ology4/tmp/mails');
    }

    /**
     * Gets the 'swiftmailer.transport' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Swift_Transport_SpoolTransport A Swift_Transport_SpoolTransport instance.
     */
    protected function getSwiftmailer_TransportService()
    {
        $this->services['swiftmailer.transport'] = $instance = new \Swift_Transport_SpoolTransport($this->get('swiftmailer.transport.eventdispatcher'), $this->get('swiftmailer.spool'));

        $instance->registerPlugin($this->get('swiftmailer.plugin.messagelogger'));

        return $instance;
    }

    /**
     * Gets the 'swiftmailer.transport.real' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Swift_Transport_EsmtpTransport A Swift_Transport_EsmtpTransport instance.
     */
    protected function getSwiftmailer_Transport_RealService()
    {
        $this->services['swiftmailer.transport.real'] = $instance = new \Swift_Transport_EsmtpTransport(new \Swift_Transport_StreamBuffer(new \Swift_StreamFilters_StringReplacementFilterFactory()), array(0 => new \Swift_Transport_Esmtp_AuthHandler(array(0 => new \Swift_Transport_Esmtp_Auth_CramMd5Authenticator(), 1 => new \Swift_Transport_Esmtp_Auth_LoginAuthenticator(), 2 => new \Swift_Transport_Esmtp_Auth_PlainAuthenticator()))), $this->get('swiftmailer.transport.eventdispatcher'));

        $instance->setHost('smtp.postmarkapp.com');
        $instance->setPort('mail');
        $instance->setEncryption(NULL);
        $instance->setUsername('3ff3dbe0-c191-4a0a-aed2-50bbd9379e85');
        $instance->setPassword('3ff3dbe0-c191-4a0a-aed2-50bbd9379e85');
        $instance->setAuthMode(NULL);

        return $instance;
    }

    /**
     * Gets the 'templating' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\TwigBundle\TwigEngine A Symfony\Bundle\TwigBundle\TwigEngine instance.
     */
    protected function getTemplatingService()
    {
        return $this->services['templating'] = new \Symfony\Bundle\TwigBundle\TwigEngine($this->get('twig'), $this->get('templating.name_parser'), $this->get('templating.globals'));
    }

    /**
     * Gets the 'templating.asset.default_package.http' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Templating\Asset\UrlPackage A Symfony\Component\Templating\Asset\UrlPackage instance.
     */
    protected function getTemplating_Asset_DefaultPackage_HttpService()
    {
        return $this->services['templating.asset.default_package.http'] = new \Symfony\Component\Templating\Asset\UrlPackage(array(0 => ''), NULL, NULL);
    }

    /**
     * Gets the 'templating.asset.default_package.ssl' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Asset\PathPackage A Symfony\Bundle\FrameworkBundle\Templating\Asset\PathPackage instance.
     */
    protected function getTemplating_Asset_DefaultPackage_SslService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('templating.asset.default_package.ssl', 'request');
        }

        return $this->services['templating.asset.default_package.ssl'] = $this->scopedServices['request']['templating.asset.default_package.ssl'] = new \Symfony\Bundle\FrameworkBundle\Templating\Asset\PathPackage($this->get('request'), NULL, NULL);
    }

    /**
     * Gets the 'templating.asset.package_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Asset\PackageFactory A Symfony\Bundle\FrameworkBundle\Templating\Asset\PackageFactory instance.
     */
    protected function getTemplating_Asset_PackageFactoryService()
    {
        return $this->services['templating.asset.package_factory'] = new \Symfony\Bundle\FrameworkBundle\Templating\Asset\PackageFactory($this);
    }

    /**
     * Gets the 'templating.globals' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables A Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables instance.
     */
    protected function getTemplating_GlobalsService()
    {
        return $this->services['templating.globals'] = new \Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables($this);
    }

    /**
     * Gets the 'templating.helper.actions' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Helper\ActionsHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\ActionsHelper instance.
     */
    protected function getTemplating_Helper_ActionsService()
    {
        return $this->services['templating.helper.actions'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\ActionsHelper($this->get('http_kernel'));
    }

    /**
     * Gets the 'templating.helper.assets' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Templating\Helper\CoreAssetsHelper A Symfony\Component\Templating\Helper\CoreAssetsHelper instance.
     */
    protected function getTemplating_Helper_AssetsService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('templating.helper.assets', 'request');
        }

        return $this->services['templating.helper.assets'] = $this->scopedServices['request']['templating.helper.assets'] = new \Symfony\Component\Templating\Helper\CoreAssetsHelper($this->get('templating.asset.package_factory')->getPackage($this->get('request'), 'templating.asset.default_package.http', 'templating.asset.default_package.ssl'), array());
    }

    /**
     * Gets the 'templating.helper.code' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Helper\CodeHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\CodeHelper instance.
     */
    protected function getTemplating_Helper_CodeService()
    {
        return $this->services['templating.helper.code'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\CodeHelper(NULL, '/var/www/ology4/app');
    }

    /**
     * Gets the 'templating.helper.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper instance.
     */
    protected function getTemplating_Helper_FormService()
    {
        $a = new \Symfony\Bundle\FrameworkBundle\Templating\PhpEngine($this->get('templating.name_parser'), $this, $this->get('templating.loader'), $this->get('templating.globals'));
        $a->setCharset('UTF-8');
        $a->setHelpers(array('slots' => 'templating.helper.slots', 'assets' => 'templating.helper.assets', 'request' => 'templating.helper.request', 'session' => 'templating.helper.session', 'router' => 'templating.helper.router', 'actions' => 'templating.helper.actions', 'code' => 'templating.helper.code', 'translator' => 'templating.helper.translator', 'form' => 'templating.helper.form', 'security' => 'templating.helper.security', 'assetic' => 'assetic.helper.static', 'facebook' => 'fos_facebook.helper', 'twitter_anywhere' => 'fos_twitter.anywhere.helper'));

        return $this->services['templating.helper.form'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper($a, array(0 => 'FrameworkBundle:Form'));
    }

    /**
     * Gets the 'templating.helper.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Helper\RequestHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\RequestHelper instance.
     */
    protected function getTemplating_Helper_RequestService()
    {
        return $this->services['templating.helper.request'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\RequestHelper($this->get('request'));
    }

    /**
     * Gets the 'templating.helper.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper instance.
     */
    protected function getTemplating_Helper_RouterService()
    {
        return $this->services['templating.helper.router'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper($this->get('router'));
    }

    /**
     * Gets the 'templating.helper.security' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper A Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper instance.
     */
    protected function getTemplating_Helper_SecurityService()
    {
        return $this->services['templating.helper.security'] = new \Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper($this->get('security.context'));
    }

    /**
     * Gets the 'templating.helper.session' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Helper\SessionHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\SessionHelper instance.
     */
    protected function getTemplating_Helper_SessionService()
    {
        return $this->services['templating.helper.session'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\SessionHelper($this->get('request'));
    }

    /**
     * Gets the 'templating.helper.slots' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Templating\Helper\SlotsHelper A Symfony\Component\Templating\Helper\SlotsHelper instance.
     */
    protected function getTemplating_Helper_SlotsService()
    {
        return $this->services['templating.helper.slots'] = new \Symfony\Component\Templating\Helper\SlotsHelper();
    }

    /**
     * Gets the 'templating.helper.translator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Helper\TranslatorHelper A Symfony\Bundle\FrameworkBundle\Templating\Helper\TranslatorHelper instance.
     */
    protected function getTemplating_Helper_TranslatorService()
    {
        return $this->services['templating.helper.translator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\TranslatorHelper($this->get('translator.default'));
    }

    /**
     * Gets the 'templating.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader A Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader instance.
     */
    protected function getTemplating_LoaderService()
    {
        return $this->services['templating.loader'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader($this->get('templating.locator'));
    }

    /**
     * Gets the 'templating.name_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser A Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser instance.
     */
    protected function getTemplating_NameParserService()
    {
        return $this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser($this->get('kernel'));
    }

    /**
     * Gets the 'translation.loader.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Translation\Loader\PhpFileLoader A Symfony\Component\Translation\Loader\PhpFileLoader instance.
     */
    protected function getTranslation_Loader_PhpService()
    {
        return $this->services['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader();
    }

    /**
     * Gets the 'translation.loader.xliff' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Translation\Loader\XliffFileLoader A Symfony\Component\Translation\Loader\XliffFileLoader instance.
     */
    protected function getTranslation_Loader_XliffService()
    {
        return $this->services['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader();
    }

    /**
     * Gets the 'translation.loader.yml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Translation\Loader\YamlFileLoader A Symfony\Component\Translation\Loader\YamlFileLoader instance.
     */
    protected function getTranslation_Loader_YmlService()
    {
        return $this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader();
    }

    /**
     * Gets the 'translator.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\FrameworkBundle\Translation\Translator A Symfony\Bundle\FrameworkBundle\Translation\Translator instance.
     */
    protected function getTranslator_DefaultService()
    {
        $this->services['translator.default'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator($this, new \Symfony\Component\Translation\MessageSelector(), array('translation.loader.php' => 'php', 'translation.loader.yml' => 'yml', 'translation.loader.xliff' => 'xliff'), array('cache_dir' => '/var/www/ology4/app/cache/prod/translations', 'debug' => true), $this->get('session'));

        $instance->setFallbackLocale('en');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.ro.xliff', 'ro', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.mn.xliff', 'mn', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.pt_PT.xliff', 'pt_PT', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.ua.xliff', 'ua', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.da.xliff', 'da', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.nl.xliff', 'nl', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.he.xliff', 'he', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.ja.xliff', 'ja', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.zh_CN.xliff', 'zh_CN', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.id.xliff', 'id', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.et.xliff', 'et', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.hu.xliff', 'hu', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.fr.xliff', 'fr', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.fa.xliff', 'fa', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.eu.xliff', 'eu', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.ca.xliff', 'ca', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.pl.xliff', 'pl', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.pt_BR.xliff', 'pt_BR', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.sl.xliff', 'sl', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.sr.xliff', 'sr', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.lb.xliff', 'lb', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.cs.xliff', 'cs', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.it.xliff', 'it', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.sv.xliff', 'sv', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.sk.xliff', 'sk', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.ru.xliff', 'ru', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.lt.xliff', 'lt', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.es.xliff', 'es', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.de.xliff', 'de', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/translations/validators.fi.xliff', 'fi', 'validators');
        $instance->addResource('xliff', '/var/www/ology4/src/Ology/SocialBundle/Resources/translations/messages.fr.xliff', 'fr', 'messages');
        $instance->addResource('yml', '/var/www/ology4/src/Ology/SocialBundle/Resources/translations/FOSUserBundle.en.yml', 'en', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.lb.yml', 'lb', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.ru.yml', 'ru', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.cs.yml', 'cs', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.hr.yml', 'hr', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.nl.yml', 'nl', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.pt_BR.yml', 'pt_BR', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.fr.yml', 'fr', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.ca.yml', 'ca', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.es.yml', 'es', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.de.yml', 'de', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.et.yml', 'et', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.bg.yml', 'bg', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.ro.yml', 'ro', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.ja.yml', 'ja', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.en.yml', 'en', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.de.yml', 'de', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.bg.yml', 'bg', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.fr.yml', 'fr', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.es.yml', 'es', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.pt_PT.yml', 'pt_PT', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.pl.yml', 'pl', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.pl.yml', 'pl', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.it.yml', 'it', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.pt_BR.yml', 'pt_BR', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.ja.yml', 'ja', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.sl.yml', 'sl', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.hr.yml', 'hr', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.it.yml', 'it', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.sv.yml', 'sv', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.sk.yml', 'sk', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.en.yml', 'en', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.hu.yml', 'hu', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/FOSUserBundle.da.yml', 'da', 'FOSUserBundle');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.sl.yml', 'sl', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.ru.yml', 'ru', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.sk.yml', 'sk', 'validators');
        $instance->addResource('yml', '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/translations/validators.nl.yml', 'nl', 'validators');

        return $instance;
    }

    /**
     * Gets the 'twig' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Twig_Environment A Twig_Environment instance.
     */
    protected function getTwigService()
    {
        $this->services['twig'] = $instance = new \Twig_Environment($this->get('twig.loader'), array('debug' => true, 'strict_variables' => true, 'exception_controller' => 'Symfony\\Bundle\\TwigBundle\\Controller\\ExceptionController::showAction', 'cache' => '/var/www/ology4/app/cache/prod/twig', 'charset' => 'UTF-8'));

        $instance->addExtension(new \Symfony\Bundle\SecurityBundle\Twig\Extension\SecurityExtension($this->get('security.context')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($this->get('translator.default')));
        $instance->addExtension(new \Symfony\Bundle\TwigBundle\Extension\AssetsExtension($this));
        $instance->addExtension(new \Symfony\Bundle\TwigBundle\Extension\ActionsExtension($this));
        $instance->addExtension(new \Symfony\Bundle\TwigBundle\Extension\CodeExtension($this));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension($this->get('router')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension(array(0 => 'form_div_layout.html.twig')));
        $instance->addExtension(new \Symfony\Bundle\AsseticBundle\Twig\AsseticExtension($this->get('assetic.asset_factory'), false, array()));
        $instance->addExtension($this->get('twig.extension.txt'));
        $instance->addExtension($this->get('estrisa_twig_image_tag.extension'));
        $instance->addExtension($this->get('fos_facebook.twig'));
        $instance->addExtension($this->get('fos_twitter.anywhere.twig'));
        $instance->addGlobal('website_url', 'http://ology4.com');
        $instance->addGlobal('post_original_image_path', 'bundles/ologysocial/up/img/post/');
        $instance->addGlobal('post_small_image_path', 'bundles/ologysocial/up/img/post/post_small/');
        $instance->addGlobal('post_medium_image_path', 'bundles/ologysocial/up/img/post/post_medium/');
        $instance->addGlobal('post_large_image_path', 'bundles/ologysocial/up/img/post/post_large/');
        $instance->addGlobal('post_audio_path', 'bundles/ologysocial/up/aud/post/');
        $instance->addGlobal('ology_original_image_path', 'bundles/ologysocial/up/img/ology/');
        $instance->addGlobal('ology_small_image_path', 'bundles/ologysocial/up/img/ology/ology_round_small/');
        $instance->addGlobal('ology_medium_image_path', 'bundles/ologysocial/up/img/ology/ology_round_medium/');
        $instance->addGlobal('ology_large_image_path', 'bundles/ologysocial/up/img/ology/ology_round_large/');
        $instance->addGlobal('user_original_image_path', 'bundles/ologysocial/up/img/user/');
        $instance->addGlobal('user_small_image_path', 'bundles/ologysocial/up/img/user/user_small/');
        $instance->addGlobal('user_medium_image_path', 'bundles/ologysocial/up/img/user/user_medium/');
        $instance->addGlobal('user_large_image_path', 'bundles/ologysocial/up/img/user/user_large/');
        $instance->addGlobal('assets_base_urls', '');
        $instance->addGlobal('sitemap_path', 'bundles/ologysocial/sitemap/');
        $instance->addGlobal('rss_path', 'bundles/ologysocial/rss/');

        return $instance;
    }

    /**
     * Gets the 'twig.exception_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\HttpKernel\EventListener\ExceptionListener A Symfony\Component\HttpKernel\EventListener\ExceptionListener instance.
     */
    protected function getTwig_ExceptionListenerService()
    {
        return $this->services['twig.exception_listener'] = new \Symfony\Component\HttpKernel\EventListener\ExceptionListener('Symfony\\Bundle\\TwigBundle\\Controller\\ExceptionController::showAction', $this->get('monolog.logger.request'));
    }

    /**
     * Gets the 'twig.extension.txt' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Twig_Extensions_Extension_Text A Twig_Extensions_Extension_Text instance.
     */
    protected function getTwig_Extension_TxtService()
    {
        return $this->services['twig.extension.txt'] = new \Twig_Extensions_Extension_Text();
    }

    /**
     * Gets the 'twig.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Bundle\TwigBundle\Loader\FilesystemLoader A Symfony\Bundle\TwigBundle\Loader\FilesystemLoader instance.
     */
    protected function getTwig_LoaderService()
    {
        $this->services['twig.loader'] = $instance = new \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader($this->get('templating.locator'), $this->get('templating.name_parser'));

        $instance->addPath('/var/www/ology4/vendor/symfony/src/Symfony/Bundle/TwigBundle/DependencyInjection/../../../Bridge/Twig/Resources/views/Form');

        return $instance;
    }

    /**
     * Gets the 'validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Validator\Validator A Symfony\Component\Validator\Validator instance.
     */
    protected function getValidatorService()
    {
        return $this->services['validator'] = new \Symfony\Component\Validator\Validator($this->get('validator.mapping.class_metadata_factory'), new \Symfony\Bundle\FrameworkBundle\Validator\ConstraintValidatorFactory($this, array('doctrine.orm.validator.unique' => 'doctrine.orm.validator.unique', 'fos_user.validator.unique' => 'fos_user.validator.unique', 'fos_user.validator.password' => 'fos_user.validator.password')), array(0 => $this->get('doctrine.orm.validator_initializer')));
    }

    /**
     * Gets the database_connection service alias.
     *
     * @return stdClass An instance of the doctrine.dbal.default_connection service
     */
    protected function getDatabaseConnectionService()
    {
        return $this->get('doctrine.dbal.default_connection');
    }

    /**
     * Gets the debug.event_dispatcher service alias.
     *
     * @return Symfony\Bundle\FrameworkBundle\Debug\TraceableEventDispatcher An instance of the event_dispatcher service
     */
    protected function getDebug_EventDispatcherService()
    {
        return $this->get('event_dispatcher');
    }

    /**
     * Gets the doctrine.orm.entity_manager service alias.
     *
     * @return Doctrine\ORM\EntityManager An instance of the doctrine.orm.default_entity_manager service
     */
    protected function getDoctrine_Orm_EntityManagerService()
    {
        return $this->get('doctrine.orm.default_entity_manager');
    }

    /**
     * Gets the facebook service alias.
     *
     * @return FOS\FacebookBundle\Facebook\FacebookSessionPersistence An instance of the fos_facebook.api service
     */
    protected function getFacebookService()
    {
        return $this->get('fos_facebook.api');
    }

    /**
     * Gets the foq_elastica.client service alias.
     *
     * @return FOQ\ElasticaBundle\Client An instance of the foq_elastica.client.search1 service
     */
    protected function getFoqElastica_ClientService()
    {
        return $this->get('foq_elastica.client.search1');
    }

    /**
     * Gets the foq_elastica.index service alias.
     *
     * @return Elastica_Index An instance of the foq_elastica.index.website service
     */
    protected function getFoqElastica_IndexService()
    {
        return $this->get('foq_elastica.index.website');
    }

    /**
     * Gets the foq_elastica.manager service alias.
     *
     * @return FOQ\ElasticaBundle\Doctrine\RepositoryManager An instance of the foq_elastica.manager.orm service
     */
    protected function getFoqElastica_ManagerService()
    {
        return $this->get('foq_elastica.manager.orm');
    }

    /**
     * Gets the fos_user.change_password.form.handler service alias.
     *
     * @return FOS\UserBundle\Form\Handler\ChangePasswordFormHandler An instance of the fos_user.change_password.form.handler.default service
     */
    protected function getFosUser_ChangePassword_Form_HandlerService()
    {
        return $this->get('fos_user.change_password.form.handler.default');
    }

    /**
     * Gets the fos_user.mailer service alias.
     *
     * @return Ology\UserBundle\Mailer\Mailer An instance of the ology.mailer service
     */
    protected function getFosUser_MailerService()
    {
        return $this->get('ology.mailer');
    }

    /**
     * Gets the fos_user.util.username_canonicalizer service alias.
     *
     * @return FOS\UserBundle\Util\Canonicalizer An instance of the fos_user.util.email_canonicalizer service
     */
    protected function getFosUser_Util_UsernameCanonicalizerService()
    {
        return $this->get('fos_user.util.email_canonicalizer');
    }

    /**
     * Gets the session.storage service alias.
     *
     * @return Snc\RedisBundle\SessionStorage\RedisSessionStorage An instance of the snc_redis.session.storage service
     */
    protected function getSession_StorageService()
    {
        return $this->get('snc_redis.session.storage');
    }

    /**
     * Gets the snc_redis.default_client service alias.
     *
     * @return Predis\Client An instance of the snc_redis.default service
     */
    protected function getSncRedis_DefaultClientService()
    {
        return $this->get('snc_redis.default');
    }

    /**
     * Gets the snc_redis.session.client service alias.
     *
     * @return Predis\Client An instance of the snc_redis.session service
     */
    protected function getSncRedis_Session_ClientService()
    {
        return $this->get('snc_redis.session');
    }

    /**
     * Gets the snc_redis.session_client service alias.
     *
     * @return Predis\Client An instance of the snc_redis.session service
     */
    protected function getSncRedis_SessionClientService()
    {
        return $this->get('snc_redis.session');
    }

    /**
     * Gets the translator service alias.
     *
     * @return Symfony\Bundle\FrameworkBundle\Translation\Translator An instance of the translator.default service
     */
    protected function getTranslatorService()
    {
        return $this->get('translator.default');
    }

    /**
     * Gets the 'assetic.asset_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return Symfony\Bundle\AsseticBundle\Factory\AssetFactory A Symfony\Bundle\AsseticBundle\Factory\AssetFactory instance.
     */
    protected function getAssetic_AssetFactoryService()
    {
        return $this->services['assetic.asset_factory'] = new \Symfony\Bundle\AsseticBundle\Factory\AssetFactory($this->get('kernel'), $this, new \Symfony\Component\DependencyInjection\ParameterBag\ParameterBag($this->getDefaultParameters()), '/var/www/ology4/app/../web', true);
    }

    /**
     * Gets the 'aws' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return Cybernox\AmazonWebServicesBundle\AmazonWebServices A Cybernox\AmazonWebServicesBundle\AmazonWebServices instance.
     */
    protected function getAwsService()
    {
        return $this->services['aws'] = new \Cybernox\AmazonWebServicesBundle\AmazonWebServices(array('key' => 'AKIAIQBND6UM45VZUBUA', 'secret' => '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', 'account_id' => NULL, 'canonical_id' => NULL, 'canonical_name' => NULL, 'mfa_serial' => NULL, 'cloudfront_keypair_id' => NULL, 'cloudfront_private_key_pem' => NULL, 'default_cache_config' => 'apc', 'enable_extensions' => false, 'certificate_authority' => false));
    }

    /**
     * Gets the 'controller_name_converter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser A Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser instance.
     */
    protected function getControllerNameConverterService()
    {
        return $this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser($this->get('kernel'));
    }

    /**
     * Gets the 'security.access.decision_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return Symfony\Component\Security\Core\Authorization\AccessDecisionManager A Symfony\Component\Security\Core\Authorization\AccessDecisionManager instance.
     */
    protected function getSecurity_Access_DecisionManagerService()
    {
        return $this->services['security.access.decision_manager'] = new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(array(0 => new \Symfony\Component\Security\Core\Authorization\Voter\RoleHierarchyVoter(new \Symfony\Component\Security\Core\Role\RoleHierarchy(array('ROLE_USER' => array(0 => 'ROLE_USER'), 'ROLE_EDITOR' => array(0 => 'ROLE_EDITOR'), 'ROLE_SUPER_ADMIN' => array(0 => 'ROLE_ADMIN', 1 => 'ROLE_ALLOWED_TO_SWITCH')))), 1 => new \Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter($this->get('security.authentication.trust_resolver'))), 'affirmative', false, true);
    }

    /**
     * Gets the 'security.authentication.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager A Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager instance.
     */
    protected function getSecurity_Authentication_ManagerService()
    {
        $a = $this->get('fos_user.user_checker');

        return $this->services['security.authentication.manager'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(array(0 => new \FOS\FacebookBundle\Security\Authentication\Provider\FacebookProvider($this->get('fos_facebook.api'), $this->get('my.facebook.user'), $a, false), 1 => new \FOS\TwitterBundle\Security\Authentication\Provider\TwitterProvider($this->get('fos_twitter.service'), $this, $this->get('my.twitter.user'), $a), 2 => new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider($this->get('fos_user.user_manager'), $a, 'main', $this->get('security.encoder_factory'), true), 3 => new \Symfony\Component\Security\Core\Authentication\Provider\RememberMeAuthenticationProvider($a, 'qwertyremember', 'main'), 4 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('4fdb95c248fa9')));
    }

    /**
     * Gets the 'security.authentication.trust_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver A Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver instance.
     */
    protected function getSecurity_Authentication_TrustResolverService()
    {
        return $this->services['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver('Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken', 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken');
    }

    /**
     * Gets the 'snc_redis.connectionfactory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return Snc\RedisBundle\Client\Predis\ConnectionFactory A Snc\RedisBundle\Client\Predis\ConnectionFactory instance.
     */
    protected function getSncRedis_ConnectionfactoryService()
    {
        $this->services['snc_redis.connectionfactory'] = $instance = new \Snc\RedisBundle\Client\Predis\ConnectionFactory();

        $instance->setConnectionWrapperClass('Snc\\RedisBundle\\Client\\Predis\\Network\\ConnectionWrapper');
        $instance->setLogger($this->get('snc_redis.logger'));

        return $instance;
    }

    /**
     * Gets the 'swiftmailer.transport.eventdispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return Swift_Events_SimpleEventDispatcher A Swift_Events_SimpleEventDispatcher instance.
     */
    protected function getSwiftmailer_Transport_EventdispatcherService()
    {
        return $this->services['swiftmailer.transport.eventdispatcher'] = new \Swift_Events_SimpleEventDispatcher();
    }

    /**
     * Gets the 'templating.locator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator A Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator instance.
     */
    protected function getTemplating_LocatorService()
    {
        return $this->services['templating.locator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator($this->get('file_locator'), '/var/www/ology4/app/cache/prod');
    }

    /**
     * Gets the 'validator.mapping.class_metadata_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return Symfony\Component\Validator\Mapping\ClassMetadataFactory A Symfony\Component\Validator\Mapping\ClassMetadataFactory instance.
     */
    protected function getValidator_Mapping_ClassMetadataFactoryService()
    {
        return $this->services['validator.mapping.class_metadata_factory'] = new \Symfony\Component\Validator\Mapping\ClassMetadataFactory(new \Symfony\Component\Validator\Mapping\Loader\LoaderChain(array(0 => new \Symfony\Component\Validator\Mapping\Loader\AnnotationLoader($this->get('annotation_reader')), 1 => new \Symfony\Component\Validator\Mapping\Loader\StaticMethodLoader(), 2 => new \Symfony\Component\Validator\Mapping\Loader\XmlFilesLoader(array(0 => '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/DependencyInjection/../../../Component/Form/Resources/config/validation.xml', 1 => '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/config/validation.xml')), 3 => new \Symfony\Component\Validator\Mapping\Loader\YamlFilesLoader(array()))), NULL);
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter($name)
    {
        $name = strtolower($name);

        if (!array_key_exists($name, $this->parameters)) {
            throw new \InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }

        return $this->parameters[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasParameter($name)
    {
        return array_key_exists(strtolower($name), $this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function setParameter($name, $value)
    {
        throw new \LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    /**
     * {@inheritDoc}
     */
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $this->parameterBag = new FrozenParameterBag($this->parameters);
        }

        return $this->parameterBag;
    }
    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => '/var/www/ology4/app',
            'kernel.environment' => 'prod',
            'kernel.debug' => true,
            'kernel.name' => 'app',
            'kernel.cache_dir' => '/var/www/ology4/app/cache/prod',
            'kernel.logs_dir' => '/var/www/ology4/app/logs',
            'kernel.bundles' => array(
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
                'DoctrineBundle' => 'Symfony\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'AsseticBundle' => 'Symfony\\Bundle\\AsseticBundle\\AsseticBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'JMSSecurityExtraBundle' => 'JMS\\SecurityExtraBundle\\JMSSecurityExtraBundle',
                'JMSAopBundle' => 'JMS\\AopBundle\\JMSAopBundle',
                'OlogySocialBundle' => 'Ology\\SocialBundle\\OlogySocialBundle',
                'EstrisaTwigImageTagBundle' => 'Estrisa\\Bundle\\TwigImageTagBundle\\EstrisaTwigImageTagBundle',
                'KnpZendCacheBundle' => 'Knp\\Bundle\\ZendCacheBundle\\KnpZendCacheBundle',
                'SncRedisBundle' => 'Snc\\RedisBundle\\SncRedisBundle',
                'FOSUserBundle' => 'FOS\\UserBundle\\FOSUserBundle',
                'FOSFacebookBundle' => 'FOS\\FacebookBundle\\FOSFacebookBundle',
                'FOSTwitterBundle' => 'FOS\\TwitterBundle\\FOSTwitterBundle',
                'FOQElasticaBundle' => 'FOQ\\ElasticaBundle\\FOQElasticaBundle',
                'CybernoxAmazonWebServicesBundle' => 'Cybernox\\AmazonWebServicesBundle\\CybernoxAmazonWebServicesBundle',
                'OlogyUserBundle' => 'Ology\\UserBundle\\OlogyUserBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'appProdDebugProjectContainer',
            'database_driver' => 'pdo_mysql',
            'database_host' => 'localhost',
            'database_port' => '3306',
            'database_name' => 'mydb',
            'database_user' => 'root',
            'database_password' => 'root',
            'mailer_transport' => 'smtp',
            'mailer_host' => 'smtp.postmarkapp.com',
            'mailer_user' => '3ff3dbe0-c191-4a0a-aed2-50bbd9379e85',
            'mailer_password' => '3ff3dbe0-c191-4a0a-aed2-50bbd9379e85',
            'locale' => 'en',
            'secret' => '96124ff1e2f975ca7f7df58bb204d94b46139265',
            'facebookappif' => '227147837348982',
            'facebooksecret' => '16829129e525a56307489c8430189df0',
            'twitter_key' => 'dFHS3YvEy2R6MIzAwmslQg',
            'twitter_secret' => 'qf5cqItorsHdLSypA1g9BJhj7a6aYnTg7E9FTGPvc',
            'server_url' => 'http://ology4.com',
            'mailer_port' => 'mail',
            'assets_base_urls' => '',
            's3_bucket' => '',
            'memcached_host' => 'localhost',
            'memcached_port' => '11211',
            'aws_key' => 'AKIAIQBND6UM45VZUBUA',
            'aws_secret' => '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',
            'symfony_root' => '/var/www/ology4/',
            'upload_folder' => '/var/www/ology4/web/bundles/ologysocial/up',
            'mail_folder' => '/var/www/ology4/tmp/mails',
            'redis-server' => 'localhost',
            'redis-port' => 6379,
            'elasticsearch-server' => 'localhost',
            'elasticsearch-port' => 9200,
            'website_url' => 'http://ology4.com',
            'tmp_dir' => '/tmp/',
            'post_original_image_path' => 'bundles/ologysocial/up/img/post/',
            'post_small_image_path' => 'bundles/ologysocial/up/img/post/post_small/',
            'post_medium_image_path' => 'bundles/ologysocial/up/img/post/post_medium/',
            'post_large_image_path' => 'bundles/ologysocial/up/img/post/post_large/',
            'post_audio_path' => 'bundles/ologysocial/up/aud/post/',
            'ology_original_image_path' => 'bundles/ologysocial/up/img/ology/',
            'ology_small_image_path' => 'bundles/ologysocial/up/img/ology/ology_round_small/',
            'ology_medium_image_path' => 'bundles/ologysocial/up/img/ology/ology_round_medium/',
            'ology_large_image_path' => 'bundles/ologysocial/up/img/ology/ology_round_large/',
            'user_original_image_path' => 'bundles/ologysocial/up/img/user/',
            'user_small_image_path' => 'bundles/ologysocial/up/img/user/user_small/',
            'user_medium_image_path' => 'bundles/ologysocial/up/img/user/user_medium/',
            'user_large_image_path' => 'bundles/ologysocial/up/img/user/user_large/',
            'sitemap_path' => 'bundles/ologysocial/sitemap/',
            'rss_path' => 'bundles/ologysocial/rss/',
            'default_comment_number' => '10;',
            'security.encoder.digest.class' => 'Ology\\SocialBundle\\Security\\MessageDigestPasswordEncoder',
            'mymailer' => array(
                'confirmation.template' => 'FOSUserBundle:Registration:email.txt.twig',
                'resetting.template' => 'OlogyUserBundle:Resetting:email.txt.twig',
                'from_email' => array(
                    'confirmation' => array(
                        'my@ology.com' => 'Ology Admin',
                    ),
                    'resetting' => array(
                        'my@ology.com' => 'Ology Admin',
                    ),
                ),
            ),
            'kernel.listener.ology.login.class' => 'Ology\\UserBundle\\Listener\\SecurityListener',
            'router_listener.class' => 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\RouterListener',
            'controller_resolver.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerResolver',
            'controller_name_converter.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerNameParser',
            'response_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener',
            'event_dispatcher.class' => 'Symfony\\Bundle\\FrameworkBundle\\ContainerAwareEventDispatcher',
            'http_kernel.class' => 'Symfony\\Bundle\\FrameworkBundle\\HttpKernel',
            'filesystem.class' => 'Symfony\\Component\\HttpKernel\\Util\\Filesystem',
            'cache_warmer.class' => 'Symfony\\Component\\HttpKernel\\CacheWarmer\\CacheWarmerAggregate',
            'file_locator.class' => 'Symfony\\Component\\HttpKernel\\Config\\FileLocator',
            'translator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\Translator',
            'translator.identity.class' => 'Symfony\\Component\\Translation\\IdentityTranslator',
            'translator.selector.class' => 'Symfony\\Component\\Translation\\MessageSelector',
            'translation.loader.php.class' => 'Symfony\\Component\\Translation\\Loader\\PhpFileLoader',
            'translation.loader.yml.class' => 'Symfony\\Component\\Translation\\Loader\\YamlFileLoader',
            'translation.loader.xliff.class' => 'Symfony\\Component\\Translation\\Loader\\XliffFileLoader',
            'debug.event_dispatcher.class' => 'Symfony\\Bundle\\FrameworkBundle\\Debug\\TraceableEventDispatcher',
            'debug.container.dump' => '/var/www/ology4/app/cache/prod/appProdDebugProjectContainer.xml',
            'kernel.secret' => '96124ff1e2f975ca7f7df58bb204d94b46139265',
            'kernel.trust_proxy_headers' => false,
            'session.class' => 'Symfony\\Component\\HttpFoundation\\Session',
            'session.storage.native.class' => 'Symfony\\Component\\HttpFoundation\\SessionStorage\\NativeSessionStorage',
            'session.storage.filesystem.class' => 'Symfony\\Component\\HttpFoundation\\SessionStorage\\FilesystemSessionStorage',
            'session_listener.class' => 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\SessionListener',
            'session.default_locale' => 'en',
            'session.storage.options' => array(
                'lifetime' => 604800,
            ),
            'form.extension.class' => 'Symfony\\Component\\Form\\Extension\\DependencyInjection\\DependencyInjectionExtension',
            'form.factory.class' => 'Symfony\\Component\\Form\\FormFactory',
            'form.type_guesser.validator.class' => 'Symfony\\Component\\Form\\Extension\\Validator\\ValidatorTypeGuesser',
            'form.csrf_provider.class' => 'Symfony\\Component\\Form\\Extension\\Csrf\\CsrfProvider\\SessionCsrfProvider',
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'validator.class' => 'Symfony\\Component\\Validator\\Validator',
            'validator.mapping.class_metadata_factory.class' => 'Symfony\\Component\\Validator\\Mapping\\ClassMetadataFactory',
            'validator.mapping.cache.apc.class' => 'Symfony\\Component\\Validator\\Mapping\\Cache\\ApcCache',
            'validator.mapping.cache.prefix' => '',
            'validator.mapping.loader.loader_chain.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\LoaderChain',
            'validator.mapping.loader.static_method_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\StaticMethodLoader',
            'validator.mapping.loader.annotation_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\AnnotationLoader',
            'validator.mapping.loader.xml_files_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\XmlFilesLoader',
            'validator.mapping.loader.yaml_files_loader.class' => 'Symfony\\Component\\Validator\\Mapping\\Loader\\YamlFilesLoader',
            'validator.validator_factory.class' => 'Symfony\\Bundle\\FrameworkBundle\\Validator\\ConstraintValidatorFactory',
            'validator.mapping.loader.xml_files_loader.mapping_files' => array(
                0 => '/var/www/ology4/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/DependencyInjection/../../../Component/Form/Resources/config/validation.xml',
                1 => '/var/www/ology4/vendor/bundles/FOS/UserBundle/Resources/config/validation.xml',
            ),
            'validator.mapping.loader.yaml_files_loader.mapping_files' => array(

            ),
            'router.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\Router',
            'routing.loader.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\DelegatingLoader',
            'routing.resolver.class' => 'Symfony\\Component\\Config\\Loader\\LoaderResolver',
            'routing.loader.xml.class' => 'Symfony\\Component\\Routing\\Loader\\XmlFileLoader',
            'routing.loader.yml.class' => 'Symfony\\Component\\Routing\\Loader\\YamlFileLoader',
            'routing.loader.php.class' => 'Symfony\\Component\\Routing\\Loader\\PhpFileLoader',
            'router.options.generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper',
            'router.options.matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper',
            'router.cache_warmer.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\RouterCacheWarmer',
            'router.options.matcher.cache_class' => 'app%kernel.environment%UrlMatcher',
            'router.options.generator.cache_class' => 'app%kernel.environment%UrlGenerator',
            'router.resource' => '/var/www/ology4/app/config/routing.yml',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'templating.engine.delegating.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\DelegatingEngine',
            'templating.name_parser.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TemplateNameParser',
            'templating.cache_warmer.template_paths.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\TemplatePathsCacheWarmer',
            'templating.locator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\TemplateLocator',
            'templating.loader.filesystem.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\FilesystemLoader',
            'templating.loader.cache.class' => 'Symfony\\Component\\Templating\\Loader\\CacheLoader',
            'templating.loader.chain.class' => 'Symfony\\Component\\Templating\\Loader\\ChainLoader',
            'templating.finder.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\TemplateFinder',
            'templating.engine.php.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\PhpEngine',
            'templating.helper.slots.class' => 'Symfony\\Component\\Templating\\Helper\\SlotsHelper',
            'templating.helper.assets.class' => 'Symfony\\Component\\Templating\\Helper\\CoreAssetsHelper',
            'templating.helper.actions.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\ActionsHelper',
            'templating.helper.router.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RouterHelper',
            'templating.helper.request.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RequestHelper',
            'templating.helper.session.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\SessionHelper',
            'templating.helper.code.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\CodeHelper',
            'templating.helper.translator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\TranslatorHelper',
            'templating.helper.form.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\FormHelper',
            'templating.globals.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\GlobalVariables',
            'templating.asset.path_package.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Asset\\PathPackage',
            'templating.asset.url_package.class' => 'Symfony\\Component\\Templating\\Asset\\UrlPackage',
            'templating.asset.package_factory.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Asset\\PackageFactory',
            'templating.helper.code.file_link_format' => NULL,
            'templating.helper.form.resources' => array(
                0 => 'FrameworkBundle:Form',
            ),
            'templating.debugger.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Debugger',
            'templating.loader.cache.path' => NULL,
            'templating.engines' => array(
                0 => 'twig',
            ),
            'annotations.reader.class' => 'Doctrine\\Common\\Annotations\\AnnotationReader',
            'annotations.cached_reader.class' => 'Doctrine\\Common\\Annotations\\CachedReader',
            'annotations.file_cache_reader.class' => 'Doctrine\\Common\\Annotations\\FileCacheReader',
            'security.context.class' => 'Symfony\\Component\\Security\\Core\\SecurityContext',
            'security.user_checker.class' => 'Symfony\\Component\\Security\\Core\\User\\UserChecker',
            'security.encoder_factory.generic.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\EncoderFactory',
            'security.encoder.plain.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\PlaintextPasswordEncoder',
            'security.user.provider.entity.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'security.user.provider.in_memory.class' => 'Symfony\\Component\\Security\\Core\\User\\InMemoryUserProvider',
            'security.user.provider.in_memory.user.class' => 'Symfony\\Component\\Security\\Core\\User\\User',
            'security.user.provider.chain.class' => 'Symfony\\Component\\Security\\Core\\User\\ChainUserProvider',
            'security.authentication.trust_resolver.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationTrustResolver',
            'security.authentication.trust_resolver.anonymous_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken',
            'security.authentication.trust_resolver.rememberme_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken',
            'security.authentication.manager.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationProviderManager',
            'security.authentication.session_strategy.class' => 'Symfony\\Component\\Security\\Http\\Session\\SessionAuthenticationStrategy',
            'security.access.decision_manager.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\AccessDecisionManager',
            'security.access.simple_role_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\RoleVoter',
            'security.access.authenticated_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\AuthenticatedVoter',
            'security.access.role_hierarchy_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\RoleHierarchyVoter',
            'security.firewall.class' => 'Symfony\\Component\\Security\\Http\\Firewall',
            'security.firewall.map.class' => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallMap',
            'security.firewall.context.class' => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallContext',
            'security.matcher.class' => 'Symfony\\Component\\HttpFoundation\\RequestMatcher',
            'security.role_hierarchy.class' => 'Symfony\\Component\\Security\\Core\\Role\\RoleHierarchy',
            'security.http_utils.class' => 'Symfony\\Component\\Security\\Http\\HttpUtils',
            'security.authentication.retry_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\RetryAuthenticationEntryPoint',
            'security.channel_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ChannelListener',
            'security.authentication.form_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\FormAuthenticationEntryPoint',
            'security.authentication.listener.form.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\UsernamePasswordFormAuthenticationListener',
            'security.authentication.listener.basic.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\BasicAuthenticationListener',
            'security.authentication.basic_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\BasicAuthenticationEntryPoint',
            'security.authentication.listener.digest.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\DigestAuthenticationListener',
            'security.authentication.digest_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\DigestAuthenticationEntryPoint',
            'security.authentication.listener.x509.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\X509AuthenticationListener',
            'security.authentication.listener.anonymous.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\AnonymousAuthenticationListener',
            'security.authentication.switchuser_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\SwitchUserListener',
            'security.logout_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\LogoutListener',
            'security.logout.handler.session.class' => 'Symfony\\Component\\Security\\Http\\Logout\\SessionLogoutHandler',
            'security.logout.handler.cookie_clearing.class' => 'Symfony\\Component\\Security\\Http\\Logout\\CookieClearingLogoutHandler',
            'security.access_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\AccessListener',
            'security.access_map.class' => 'Symfony\\Component\\Security\\Http\\AccessMap',
            'security.exception_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ExceptionListener',
            'security.context_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ContextListener',
            'security.authentication.provider.dao.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\DaoAuthenticationProvider',
            'security.authentication.provider.pre_authenticated.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\PreAuthenticatedAuthenticationProvider',
            'security.authentication.provider.anonymous.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\AnonymousAuthenticationProvider',
            'security.authentication.provider.rememberme.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\RememberMeAuthenticationProvider',
            'security.authentication.listener.rememberme.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\RememberMeListener',
            'security.rememberme.token.provider.in_memory.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\RememberMe\\InMemoryTokenProvider',
            'security.authentication.rememberme.services.persistent.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\PersistentTokenBasedRememberMeServices',
            'security.authentication.rememberme.services.simplehash.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\TokenBasedRememberMeServices',
            'security.rememberme.response_listener.class' => 'Symfony\\Bundle\\SecurityBundle\\EventListener\\ResponseListener',
            'templating.helper.security.class' => 'Symfony\\Bundle\\SecurityBundle\\Templating\\Helper\\SecurityHelper',
            'data_collector.security.class' => 'Symfony\\Bundle\\SecurityBundle\\DataCollector\\SecurityDataCollector',
            'security.access.denied_url' => NULL,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => true,
            'fos_facebook.options.main' => array(
                'provider' => 'my_fos_facebook_provider',
                'check_path' => '/facebook/check',
                'login_path' => '/splash',
                'default_target_path' => '/facebook/redirect',
                'app_url' => 'http://apps.facebook.com/appName/ology_dev',
                'server_url' => 'http://ology4.com',
                'remember_me' => true,
                'use_forward' => false,
                'always_use_default_target_path' => false,
                'target_path_parameter' => '_target_path',
                'use_referer' => false,
                'failure_path' => NULL,
                'failure_forward' => false,
                'display' => 'page',
                'create_user_if_not_exists' => false,
            ),
            'security.role_hierarchy.roles' => array(
                'ROLE_USER' => array(
                    0 => 'ROLE_USER',
                ),
                'ROLE_EDITOR' => array(
                    0 => 'ROLE_EDITOR',
                ),
                'ROLE_SUPER_ADMIN' => array(
                    0 => 'ROLE_ADMIN',
                    1 => 'ROLE_ALLOWED_TO_SWITCH',
                ),
            ),
            'twig.class' => 'Twig_Environment',
            'twig.loader.class' => 'Symfony\\Bundle\\TwigBundle\\Loader\\FilesystemLoader',
            'templating.engine.twig.class' => 'Symfony\\Bundle\\TwigBundle\\TwigEngine',
            'twig.cache_warmer.class' => 'Symfony\\Bundle\\TwigBundle\\CacheWarmer\\TemplateCacheCacheWarmer',
            'twig.extension.trans.class' => 'Symfony\\Bridge\\Twig\\Extension\\TranslationExtension',
            'twig.extension.assets.class' => 'Symfony\\Bundle\\TwigBundle\\Extension\\AssetsExtension',
            'twig.extension.actions.class' => 'Symfony\\Bundle\\TwigBundle\\Extension\\ActionsExtension',
            'twig.extension.code.class' => 'Symfony\\Bundle\\TwigBundle\\Extension\\CodeExtension',
            'twig.extension.routing.class' => 'Symfony\\Bridge\\Twig\\Extension\\RoutingExtension',
            'twig.extension.yaml.class' => 'Symfony\\Bridge\\Twig\\Extension\\YamlExtension',
            'twig.extension.form.class' => 'Symfony\\Bridge\\Twig\\Extension\\FormExtension',
            'twig.exception_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ExceptionListener',
            'twig.exception_listener.controller' => 'Symfony\\Bundle\\TwigBundle\\Controller\\ExceptionController::showAction',
            'twig.form.resources' => array(
                0 => 'form_div_layout.html.twig',
            ),
            'twig.options' => array(
                'debug' => true,
                'strict_variables' => true,
                'exception_controller' => 'Symfony\\Bundle\\TwigBundle\\Controller\\ExceptionController::showAction',
                'cache' => '/var/www/ology4/app/cache/prod/twig',
                'charset' => 'UTF-8',
            ),
            'monolog.logger.class' => 'Symfony\\Bridge\\Monolog\\Logger',
            'monolog.handler.stream.class' => 'Monolog\\Handler\\StreamHandler',
            'monolog.handler.fingers_crossed.class' => 'Monolog\\Handler\\FingersCrossedHandler',
            'monolog.handler.group.class' => 'Monolog\\Handler\\GroupHandler',
            'monolog.handler.buffer.class' => 'Monolog\\Handler\\BufferHandler',
            'monolog.handler.rotating_file.class' => 'Monolog\\Handler\\RotatingFileHandler',
            'monolog.handler.syslog.class' => 'Monolog\\Handler\\SyslogHandler',
            'monolog.handler.null.class' => 'Monolog\\Handler\\NullHandler',
            'monolog.handler.test.class' => 'Monolog\\Handler\\TestHandler',
            'monolog.handler.firephp.class' => 'Symfony\\Bridge\\Monolog\\Handler\\FirePHPHandler',
            'monolog.handler.debug.class' => 'Symfony\\Bridge\\Monolog\\Handler\\DebugHandler',
            'monolog.handler.swift_mailer.class' => 'Monolog\\Handler\\SwiftMailerHandler',
            'monolog.handler.native_mailer.class' => 'Monolog\\Handler\\NativeMailerHandler',
            'swiftmailer.class' => 'Swift_Mailer',
            'swiftmailer.transport.sendmail.class' => 'Swift_Transport_SendmailTransport',
            'swiftmailer.transport.mail.class' => 'Swift_Transport_MailTransport',
            'swiftmailer.transport.failover.class' => 'Swift_Transport_FailoverTransport',
            'swiftmailer.plugin.redirecting.class' => 'Swift_Plugins_RedirectingPlugin',
            'swiftmailer.plugin.impersonate.class' => 'Swift_Plugins_ImpersonatePlugin',
            'swiftmailer.plugin.messagelogger.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\Logger\\MessageLogger',
            'swiftmailer.plugin.antiflood.class' => 'Swift_Plugins_AntiFloodPlugin',
            'swiftmailer.plugin.antiflood.threshold' => 99,
            'swiftmailer.plugin.antiflood.sleep' => 0,
            'swiftmailer.data_collector.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\DataCollector\\MessageDataCollector',
            'swiftmailer.transport.smtp.class' => 'Swift_Transport_EsmtpTransport',
            'swiftmailer.transport.smtp.encryption' => NULL,
            'swiftmailer.transport.smtp.port' => 'mail',
            'swiftmailer.transport.smtp.host' => 'smtp.postmarkapp.com',
            'swiftmailer.transport.smtp.username' => '3ff3dbe0-c191-4a0a-aed2-50bbd9379e85',
            'swiftmailer.transport.smtp.password' => '3ff3dbe0-c191-4a0a-aed2-50bbd9379e85',
            'swiftmailer.transport.smtp.auth_mode' => NULL,
            'swiftmailer.plugin.blackhole.class' => 'Swift_Plugins_BlackholePlugin',
            'swiftmailer.spool.file.class' => 'Swift_FileSpool',
            'swiftmailer.spool.file.path' => '/var/www/ology4/tmp/mails',
            'swiftmailer.spool.enabled' => true,
            'swiftmailer.sender_address' => NULL,
            'swiftmailer.single_address' => NULL,
            'doctrine.dbal.logger.debug.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Symfony\\Bridge\\Doctrine\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Doctrine\\Common\\EventManager',
            'doctrine.dbal.connection_factory.class' => 'Symfony\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Symfony\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.dbal.connection_factory.types' => array(

            ),
            'doctrine.connections' => array(
                'default' => 'doctrine.dbal.default_connection',
            ),
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.annotation_reader.class' => 'Symfony\\Bridge\\Doctrine\\Annotations\\IndexedReader',
            'doctrine.orm.metadata.xml.class' => 'Symfony\\Bridge\\Doctrine\\Mapping\\Driver\\XmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Symfony\\Bridge\\Doctrine\\Mapping\\Driver\\YamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\EntityInitializer',
            'doctrine.entity_managers' => array(
                'default' => 'doctrine.orm.default_entity_manager',
            ),
            'doctrine.default_entity_manager' => 'default',
            'doctrine.orm.auto_generate_proxy_classes' => true,
            'doctrine.orm.proxy_dir' => '/var/www/ology4/app/cache/prod/doctrine/orm/Proxies',
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'assetic.asset_factory.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\AssetFactory',
            'assetic.asset_manager.class' => 'Assetic\\Factory\\LazyAssetManager',
            'assetic.asset_manager_cache_warmer.class' => 'Symfony\\Bundle\\AsseticBundle\\CacheWarmer\\AssetManagerCacheWarmer',
            'assetic.cached_formula_loader.class' => 'Assetic\\Factory\\Loader\\CachedFormulaLoader',
            'assetic.config_cache.class' => 'Assetic\\Cache\\ConfigCache',
            'assetic.config_loader.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Loader\\ConfigurationLoader',
            'assetic.config_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\ConfigurationResource',
            'assetic.coalescing_directory_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\CoalescingDirectoryResource',
            'assetic.directory_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\DirectoryResource',
            'assetic.filter_manager.class' => 'Symfony\\Bundle\\AsseticBundle\\FilterManager',
            'assetic.worker.ensure_filter.class' => 'Assetic\\Factory\\Worker\\EnsureFilterWorker',
            'assetic.node.paths' => array(

            ),
            'assetic.cache_dir' => '/var/www/ology4/app/cache/prod/assetic',
            'assetic.twig_extension.class' => 'Symfony\\Bundle\\AsseticBundle\\Twig\\AsseticExtension',
            'assetic.twig_formula_loader.class' => 'Assetic\\Extension\\Twig\\TwigFormulaLoader',
            'assetic.helper.dynamic.class' => 'Symfony\\Bundle\\AsseticBundle\\Templating\\DynamicAsseticHelper',
            'assetic.helper.static.class' => 'Symfony\\Bundle\\AsseticBundle\\Templating\\StaticAsseticHelper',
            'assetic.php_formula_loader.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Loader\\AsseticHelperFormulaLoader',
            'assetic.debug' => true,
            'assetic.use_controller' => false,
            'assetic.enable_profiler' => false,
            'assetic.read_from' => '/var/www/ology4/app/../web',
            'assetic.write_to' => 's3://AKIAIQBND6UM45VZUBUA:lHvP0WwsQ3Sumi/CG9m+PSfKqXd8OFNILoGauYq/@ology/',
            'assetic.java.bin' => '/usr/bin/java',
            'assetic.node.bin' => '/usr/bin/node',
            'assetic.sass.bin' => '/usr/bin/sass',
            'assetic.filter.cssrewrite.class' => 'Assetic\\Filter\\CssRewriteFilter',
            'assetic.filter.yui_css.class' => 'Assetic\\Filter\\Yui\\CssCompressorFilter',
            'assetic.filter.yui_css.java' => '/usr/bin/java',
            'assetic.filter.yui_css.jar' => '/usr/share/yui-compressor/yui-compressor.jar',
            'assetic.filter.yui_css.charset' => 'UTF-8',
            'assetic.twig_extension.functions' => array(

            ),
            'assetic.asset_writer_cache_warmer.class' => 'Symfony\\Bundle\\AsseticBundle\\CacheWarmer\\AssetWriterCacheWarmer',
            'assetic.asset_writer.class' => 'Assetic\\AssetWriter',
            'sensio_framework_extra.controller.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener',
            'sensio_framework_extra.routing.loader.annot_dir.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationDirectoryLoader',
            'sensio_framework_extra.routing.loader.annot_file.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationFileLoader',
            'sensio_framework_extra.routing.loader.annot_class.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Routing\\AnnotatedRouteControllerLoader',
            'sensio_framework_extra.converter.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener',
            'sensio_framework_extra.converter.manager.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\ParamConverterManager',
            'sensio_framework_extra.converter.doctrine.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DoctrineParamConverter',
            'sensio_framework_extra.view.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener',
            'security.secured_services' => array(

            ),
            'security.access.method_interceptor.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Interception\\MethodSecurityInterceptor',
            'security.access.run_as_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\RunAsManager',
            'security.authentication.provider.run_as.class' => 'JMS\\SecurityExtraBundle\\Security\\Authentication\\Provider\\RunAsAuthenticationProvider',
            'security.run_as.key' => 'RunAsToken',
            'security.run_as.role_prefix' => 'ROLE_',
            'security.access.after_invocation_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\AfterInvocation\\AfterInvocationManager',
            'security.access.after_invocation.acl_provider.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\AfterInvocation\\AclAfterInvocationProvider',
            'security.extra.controller_listener.class' => 'JMS\\SecurityExtraBundle\\Controller\\ControllerListener',
            'security.access.iddqd_voter.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Voter\\IddqdVoter',
            'security.extra.secure_all_services' => false,
            'jms_aop.cache_dir' => '/var/www/ology4/app/cache/prod/jms_aop',
            'jms_aop.interceptor_loader.class' => 'JMS\\AopBundle\\Aop\\InterceptorLoader',
            'estrisa_twig_image_tag.extension.class' => 'Estrisa\\Bundle\\TwigImageTagBundle\\Twig\\ImageTagExtension',
            'knp_zend_cache.manager.class' => 'Zend\\Cache\\Manager',
            'snc_redis.client.class' => 'Predis\\Client',
            'snc_redis.client_options.class' => 'Predis\\Options\\ClientOptions',
            'snc_redis.connection_parameters.class' => 'Predis\\ConnectionParameters',
            'snc_redis.connection_factory.class' => 'Snc\\RedisBundle\\Client\\Predis\\ConnectionFactory',
            'snc_redis.connection_wrapper.class' => 'Snc\\RedisBundle\\Client\\Predis\\Network\\ConnectionWrapper',
            'snc_redis.logger.class' => 'Snc\\RedisBundle\\Logger\\RedisLogger',
            'snc_redis.data_collector.class' => 'Snc\\RedisBundle\\DataCollector\\RedisDataCollector',
            'snc_redis.doctrine_cache.class' => 'Snc\\RedisBundle\\Doctrine\\Cache\\RedisCache',
            'snc_redis.monolog_handler.class' => 'Snc\\RedisBundle\\Monolog\\Handler\\RedisHandler',
            'snc_redis.swiftmailer_spool.class' => 'Snc\\RedisBundle\\SwiftMailer\\RedisSpool',
            'snc_redis.session.class' => 'Snc\\RedisBundle\\SessionStorage\\RedisSessionStorage',
            'snc_redis.session.client' => 'session',
            'snc_redis.session.prefix' => 'session',
            'fos_user.validator.password.class' => 'FOS\\UserBundle\\Validator\\PasswordValidator',
            'fos_user.validator.unique.class' => 'FOS\\UserBundle\\Validator\\UniqueValidator',
            'fos_user.security.interactive_login_listener.class' => 'FOS\\UserBundle\\Security\\InteractiveLoginListener',
            'fos_user.resetting.email.template' => 'OlogyUserBundle:Resetting:email.txt.twig',
            'fos_user.registration.confirmation.template' => 'FOSUserBundle:Registration:email.txt.twig',
            'fos_user.firewall_name' => 'main',
            'fos_user.model_manager_name' => NULL,
            'fos_user.model.user.class' => 'Ology\\SocialBundle\\Entity\\User',
            'fos_user.template.engine' => 'twig',
            'fos_user.template.theme' => 'FOSUserBundle::form.html.twig',
            'fos_user.profile.form.type' => 'fos_user_profile',
            'fos_user.profile.form.name' => 'fos_user_profile_form',
            'fos_user.profile.form.validation_groups' => array(
                0 => 'Profile',
                1 => 'Default',
            ),
            'fos_user.registration.confirmation.from_email' => array(
                'my@ology.com' => 'Ology Admin',
            ),
            'fos_user.registration.confirmation.enabled' => false,
            'fos_user.registration.form.type' => 'ology_user_registration',
            'fos_user.registration.form.name' => 'fos_user_registration_form',
            'fos_user.registration.form.validation_groups' => array(
                0 => 'Registration',
                1 => 'Default',
            ),
            'fos_user.change_password.form.type' => 'fos_user_change_password',
            'fos_user.change_password.form.name' => 'fos_user_change_password_form',
            'fos_user.change_password.form.validation_groups' => array(
                0 => 'ChangePassword',
                1 => 'Default',
            ),
            'fos_user.resetting.email.from_email' => array(
                'my@ology.com' => 'Ology Admin',
            ),
            'fos_user.resetting.token_ttl' => 86400,
            'fos_user.resetting.form.type' => 'ology_user_resetting',
            'fos_user.resetting.form.name' => 'fos_user_resetting_form',
            'fos_user.resetting.form.validation_groups' => array(
                0 => 'ResetPassword',
            ),
            'fos_facebook.api.class' => 'FOS\\FacebookBundle\\Facebook\\FacebookSessionPersistence',
            'fos_facebook.helper.class' => 'FOS\\FacebookBundle\\Templating\\Helper\\FacebookHelper',
            'fos_facebook.twig.class' => 'FOS\\FacebookBundle\\Twig\\Extension\\FacebookExtension',
            'fos_facebook.file' => '/var/www/ology4/app/../vendor/facebook/src/base_facebook.php',
            'fos_facebook.app_id' => '227147837348982',
            'fos_facebook.secret' => '16829129e525a56307489c8430189df0',
            'fos_facebook.cookie' => true,
            'fos_facebook.domain' => NULL,
            'fos_facebook.logging' => true,
            'fos_facebook.culture' => 'en_US',
            'fos_facebook.permissions' => array(
                0 => 'email',
                1 => 'user_birthday',
                2 => 'user_location',
                3 => 'publish_stream',
            ),
            'fos_twitter.file' => '/var/www/ology4/app/../vendor/TwitterOAuth/twitteroauth/twitteroauth.php',
            'fos_twitter.consumer_key' => 'dFHS3YvEy2R6MIzAwmslQg',
            'fos_twitter.consumer_secret' => 'qf5cqItorsHdLSypA1g9BJhj7a6aYnTg7E9FTGPvc',
            'fos_twitter.callback_url' => 'http://ology4.comtwitter/check',
            'fos_twitter.anywhere_version' => '1',
            'fos_twitter.anywhere.helper.class' => 'FOS\\TwitterBundle\\Templating\\Helper\\TwitterAnywhereHelper',
            'fos_twitter.anywhere.twig.class' => 'FOS\\TwitterBundle\\Twig\\Extension\\TwitterAnywhereExtension',
            'fos_twitter.api.class' => 'TwitterOAuth',
            'fos_twitter.service.class' => 'FOS\\TwitterBundle\\Services\\Twitter',
            'foq_elastica.client.class' => 'FOQ\\ElasticaBundle\\Client',
            'foq_elastica.index.class' => 'Elastica_Index',
            'foq_elastica.type.class' => 'Elastica_Type',
            'foq_elastica.logger.class' => 'FOQ\\ElasticaBundle\\Logger\\ElasticaLogger',
            'foq_elastica.data_collector.class' => 'FOQ\\ElasticaBundle\\DataCollector\\ElasticaDataCollector',
            'foq_elastica.manager.class' => 'FOQ\\ElasticaBundle\\Manager\\RepositoryManager',
            'foq_elastica.elastica_to_model_transformer.collection.class' => 'FOQ\\ElasticaBundle\\Transformer\\ElasticaToModelTransformerCollection',
            'foq_elastica.provider_registry.class' => 'FOQ\\ElasticaBundle\\Provider\\ProviderRegistry',
            'aws.class' => 'Cybernox\\AmazonWebServicesBundle\\AmazonWebServices',
            'aws_factory.class' => 'Cybernox\\AmazonWebServicesBundle\\AmazonWebServicesFactory',
            'cybernox_amazon_web_services.key' => 'AKIAIQBND6UM45VZUBUA',
            'cybernox_amazon_web_services.secret' => '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',
            'cybernox_amazon_web_services.default_cache_config' => 'apc',
            'cybernox_amazon_web_services.enable_extensions' => false,
            'cybernox_amazon_web_services.certificate_authority' => false,
            'cybernox_amazon_web_services.account_id' => NULL,
            'cybernox_amazon_web_services.canonical_id' => NULL,
            'cybernox_amazon_web_services.canonical_name' => NULL,
            'cybernox_amazon_web_services.mfa_serial' => NULL,
            'cybernox_amazon_web_services.cloudfront_keypair_id' => NULL,
            'cybernox_amazon_web_services.cloudfront_private_key_pem' => NULL,
        );
    }
}
