<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Notify\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string sid
 * @property string accountSid
 * @property string friendlyName
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string apnCredentialSid
 * @property string gcmCredentialSid
 * @property string fcmCredentialSid
 * @property string messagingServiceSid
 * @property string facebookMessengerPageId
 * @property string defaultApnNotificationProtocolVersion
 * @property string defaultGcmNotificationProtocolVersion
 * @property string defaultFcmNotificationProtocolVersion
 * @property string url
 * @property array links
 */
class ServiceInstance extends InstanceResource {
    protected $_bindings = null;
    protected $_notifications = null;

    /**
     * Initialize the ServiceInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The sid
     * @return \Twilio\Rest\Notify\V1\ServiceInstance 
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'apnCredentialSid' => Values::array_get($payload, 'apn_credential_sid'),
            'gcmCredentialSid' => Values::array_get($payload, 'gcm_credential_sid'),
            'fcmCredentialSid' => Values::array_get($payload, 'fcm_credential_sid'),
            'messagingServiceSid' => Values::array_get($payload, 'messaging_service_sid'),
            'facebookMessengerPageId' => Values::array_get($payload, 'facebook_messenger_page_id'),
            'defaultApnNotificationProtocolVersion' => Values::array_get($payload, 'default_apn_notification_protocol_version'),
            'defaultGcmNotificationProtocolVersion' => Values::array_get($payload, 'default_gcm_notification_protocol_version'),
            'defaultFcmNotificationProtocolVersion' => Values::array_get($payload, 'default_fcm_notification_protocol_version'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        );

        $this->solution = array(
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Notify\V1\ServiceContext Context for this
     *                                               ServiceInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ServiceContext(
                $this->version,
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Deletes the ServiceInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Fetch a ServiceInstance
     * 
     * @return ServiceInstance Fetched ServiceInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the ServiceInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     */
    public function update($options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Access the bindings
     * 
     * @return \Twilio\Rest\Notify\V1\Service\BindingList 
     */
    protected function getBindings() {
        return $this->proxy()->bindings;
    }

    /**
     * Access the notifications
     * 
     * @return \Twilio\Rest\Notify\V1\Service\NotificationList 
     */
    protected function getNotifications() {
        return $this->proxy()->notifications;
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Notify.V1.ServiceInstance ' . implode(' ', $context) . ']';
    }
}