<?php

namespace Biplane\YandexDirect;

use Biplane\YandexDirect\Api\V4\YandexAPIService;
use Biplane\YandexDirect\Api\V5\AdExtensions;
use Biplane\YandexDirect\Api\V5\AdGroups;
use Biplane\YandexDirect\Api\V5\Ads;
use Biplane\YandexDirect\Api\V5\BidModifiers;
use Biplane\YandexDirect\Api\V5\Bids;
use Biplane\YandexDirect\Api\V5\Campaigns;
use Biplane\YandexDirect\Api\V5\Changes;
use Biplane\YandexDirect\Api\V5\Clients;
use Biplane\YandexDirect\Api\V5\Dictionaries;
use Biplane\YandexDirect\Api\V5\DynamicTextAdTargets;
use Biplane\YandexDirect\Api\V5\Keywords;
use Biplane\YandexDirect\Api\V5\Sitelinks;
use Biplane\YandexDirect\Api\V5\VCards;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Provides profile for APIs.
 *
 * @author Denis Vasilev
 */
class User
{
    const LOCALE_RU = 'ru';
    const LOCALE_EN = 'en';
    const LOCALE_UA = 'ua';

    private static $classMap = [
        'YandexApiService' => '\Biplane\YandexDirect\Api\V4\YandexAPIService',
        'AdGroups' => 'Biplane\YandexDirect\Api\V5\AdGroups',
        'AdExtensions' => 'Biplane\YandexDirect\Api\V5\AdExtensions',
        'Ads' => 'Biplane\YandexDirect\Api\V5\Ads',
        'Bids' => 'Biplane\YandexDirect\Api\V5\Bids',
        'BidModifiers' => 'Biplane\YandexDirect\Api\V5\BidModifiers',
        'Campaigns' => 'Biplane\YandexDirect\Api\V5\Campaigns',
        'Changes' => 'Biplane\YandexDirect\Api\V5\Changes',
        'Clients' => 'Biplane\YandexDirect\Api\V5\Clients',
        'Dictionaries' => 'Biplane\YandexDirect\Api\V5\Dictionaries',
        'DynamicTextAdTargets' => 'Biplane\YandexDirect\Api\V5\DynamicTextAdTargets',
        'Keywords' => 'Biplane\YandexDirect\Api\V5\Keywords',
        'Sitelinks' => 'Biplane\YandexDirect\Api\V5\Sitelinks',
        'VCards' => 'Biplane\YandexDirect\Api\V5\VCards',
    ];

    private $options;
    private $dispatcher;
    private $proxies;

    /**
     * Constructor.
     *
     * @param array                         $options    The options
     * @param EventDispatcherInterface|null $dispatcher The event dispatcher
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $options = [], EventDispatcherInterface $dispatcher = null)
    {
        $resolver = new OptionsResolver();
        $this->setDefaultOptions($resolver);

        if ($dispatcher === null) {
            $dispatcher = new EventDispatcher();
        }

        $this->options = $resolver->resolve($options);
        $this->dispatcher = $dispatcher;
        $this->proxies = [];

        if (!empty($this->options['master_token']) && empty($this->options['login'])) {
            throw new \InvalidArgumentException('The login cannot be empty when the master token is set.');
        }
    }

    /**
     * Gets the hash code of this object.
     *
     * @return string
     */
    public function getHashCode()
    {
        return md5($this->options['access_token']);
    }

    /**
     * Gets the event dispatcher.
     *
     * @return EventDispatcherInterface
     */
    public function getEventDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * Gets the access token.
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->options['access_token'];
    }

    /**
     * Gets the login.
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->options['login'];
    }

    /**
     * Gets the locale.
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->options['locale'];
    }

    /**
     * Gets the master token for financial operations.
     *
     * @return string
     */
    public function getMasterToken()
    {
        return $this->options['master_token'];
    }

    /**
     * Determines whether should be used units of agency.
     *
     * @return bool
     */
    public function useOperatorUnits()
    {
        return $this->options['use_operator_units'];
    }

    /**
     * Gets the proxy for API of version 4 Live.
     *
     * @return YandexAPIService
     */
    public function getApiService()
    {
        return $this->getProxy('YandexApiService');
    }

    /**
     * Gets the proxy of web-service for manage ad's extensions.
     *
     * @return AdExtensions
     */
    public function getAdExtensionsService()
    {
        return $this->getProxy('AdExtensions');
    }

    /**
     * Gets the proxy of web-service for manage ad groups.
     *
     * @return AdGroups
     */
    public function getAdGroupsService()
    {
        return $this->getProxy('AdGroups');
    }

    /**
     * Gets the proxy of web-service for manage ads.
     *
     * @return Ads
     */
    public function getAdsService()
    {
        return $this->getProxy('Ads');
    }

    /**
     * Gets the proxy of web-service for manage bids.
     *
     * @return Bids
     */
    public function getBidsService()
    {
        return $this->getProxy('Bids');
    }

    /**
     * Gets the proxy of web-service for the adjustments of bids.
     *
     * @return BidModifiers
     */
    public function getBidModifiersService()
    {
        return $this->getProxy('BidModifiers');
    }

    /**
     * Gets the proxy of web-service for manage campaigns.
     *
     * @return Campaigns
     */
    public function getCampaignsService()
    {
        return $this->getProxy('Campaigns');
    }

    /**
     * Gets the proxy of web-service to check for changes.
     *
     * @return Changes
     */
    public function getChangesService()
    {
        return $this->getProxy('Changes');
    }

    /**
     * Gets the proxy of web-service for manage clients.
     *
     * @return Clients
     */
    public function getClientsService()
    {
        return $this->getProxy('Clients');
    }

    /**
     * Gets the proxy of web-service for fetch info about dictionaries.
     *
     * @return Dictionaries
     */
    public function getDictionariesService()
    {
        return $this->getProxy('Dictionaries');
    }

    /**
     * Gets the proxy of web-service for manage dynamic text ads.
     *
     * @return DynamicTextAdTargets
     */
    public function getDynamicTextAdTargetsService()
    {
        return $this->getProxy('DynamicTextAdTargets');
    }

    /**
     * Gets the proxy of web-service for manage keywords.
     *
     * @return Keywords
     */
    public function getKeywordsService()
    {
        return $this->getProxy('Keywords');
    }

    /**
     * Gets the proxy of web-service for manage sitelinks.
     *
     * @return Sitelinks
     */
    public function getSitelinksService()
    {
        return $this->getProxy('Sitelinks');
    }

    /**
     * Gets the proxy of web-service for manage VCards.
     *
     * @return VCards
     */
    public function getVCardsService()
    {
        return $this->getProxy('VCards');
    }

    /**
     * Creates the finance token.
     *
     * @param string $methodName   The API method for which needed it token
     * @param int    $operationNum A number of operation
     *
     * @throws \LogicException When the master token is empty
     *
     * @return string
     */
    public function createFinanceToken($methodName, $operationNum)
    {
        if (empty($this->options['master_token'])) {
            throw new \LogicException('The finance token cannot be created when the master token is empty.');
        }

        if (empty($this->options['login'])) {
            throw new \LogicException('The finance token cannot be created when the login is empty.');
        }

        return hash('sha256', $this->options['master_token'] . $operationNum . $methodName . $this->options['login']);
    }

    /**
     * Resolves the URI to WSDL.
     *
     * @param string $uri The origin URI to WSDL file
     *
     * @return string
     */
    public function resolveWsdl($uri)
    {
        if ($this->options['sandbox']) {
            return str_replace('api.direct.yandex.', 'api-sandbox.direct.yandex.', $uri);
        }

        return $uri;
    }

    /**
     * Gets the generic options for the SOAP client.
     *
     * @return array
     */
    public function getSoapOptions()
    {
        return $this->options['soap_options'];
    }

    /**
     * Sets the default options.
     *
     * @param OptionsResolver $resolver
     */
    protected function setDefaultOptions(OptionsResolver $resolver)
    {
        // Если логин пользователя содержит точки и символы верхнего регистра (заглавные буквы),
        // то для получения нормализованного логина их следует заменить, соответственно, дефисами
        // и символами нижнего регистра.
        // http://api.yandex.ru/direct/doc/concepts/finance.xml#access
        $loginNormalizer = function (Options $options, $value) {
            if (is_string($value)) {
                return strtolower(str_replace('.', '-', $value));
            }

            return $value;
        };

        $resolver
            ->setRequired(['access_token'])
            ->setDefaults([
                'locale' => self::LOCALE_EN,
                'master_token' => null,
                'login' => null,
                'sandbox' => false,
                'use_operator_units' => false,
                'soap_options' => [],
            ]);

        // OptionsResolver 2.6+
        if (method_exists($resolver, 'setNormalizer')) {
            $resolver
                ->setAllowedValues('locale', [self::LOCALE_EN, self::LOCALE_RU, self::LOCALE_UA])
                ->setAllowedTypes('master_token', ['null', 'string'])
                ->setAllowedTypes('login', ['null', 'string'])
                ->setAllowedTypes('access_token', 'string')
                ->setAllowedTypes('sandbox', 'bool')
                ->setAllowedTypes('use_operator_units', 'bool')
                ->setNormalizer('login', $loginNormalizer);
        } else {
            $resolver
                ->setAllowedValues([
                    'locale' => [self::LOCALE_EN, self::LOCALE_RU, self::LOCALE_UA],
                ])
                ->setAllowedTypes([
                    'master_token' => ['null', 'string'],
                    'login' => ['null', 'string'],
                    'access_token' => ['string'],
                    'sandbox' => ['bool'],
                    'use_operator_units' => ['bool'],
                    'soap_options' => ['array'],
                ])
                ->setNormalizers([
                    'login' => $loginNormalizer,
                ]);
        }
    }

    private function getProxy($serviceClass)
    {
        if (isset($this->proxies[$serviceClass])) {
            return $this->proxies[$serviceClass];
        }

        return $this->proxies[$serviceClass] = new self::$classMap[$serviceClass]($this->dispatcher, $this);
    }
}
