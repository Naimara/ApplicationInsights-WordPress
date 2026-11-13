<?php

namespace ApplicationInsights\WordPress;

/**
 *  Does server-side instrumentation using the PHP SDK for Application Insights
 */
class Server_Instrumentation
{
    private ?\ApplicationInsights\Telemetry_Client $_telemetryClient = null;

    public function __construct()
    {
        $instrumentationKey = Common::getInstrumentationKey();
        if ( $instrumentationKey === '' ) {
            return;
        }

        $this->_telemetryClient = new \ApplicationInsights\Telemetry_Client();
        $this->_telemetryClient->getContext()->setInstrumentationKey( $instrumentationKey );
        $sdkVer = $this->_telemetryClient->getContext()->getInternalContext()->getSdkVersion();
        $this->_telemetryClient->getContext()->getInternalContext()->setSdkVersion( 'wp_' . $sdkVer );

        set_exception_handler( array( $this, 'exceptionHandler' ) );
    }

    public function endRequest(): void
    {
        if ( $this->_telemetryClient === null ) {
            return;
        }

        if ( is_page() || is_single() || is_category() || is_home() || is_archive() || is_404() ) {
            $host = isset( $_SERVER['HTTP_HOST'] ) ? (string) $_SERVER['HTTP_HOST'] : '';
            $uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) $_SERVER['REQUEST_URI'] : '';
            $url = $host . $uri;
            $requestName = Common::getPageTitle();
            $startTime = isset( $_SERVER['REQUEST_TIME'] ) ? (int) $_SERVER['REQUEST_TIME'] : time();
            $duration = (float) timer_stop( 0, 3 ) * 1000;
            $statusCode = http_response_code();
            if ( $statusCode === false ) {
                $statusCode = 200;
            }

            $this->_telemetryClient->trackRequest(
                $requestName,
                $url,
                $startTime,
                $duration,
                $statusCode,
                ! is_404()
            );

            $this->_telemetryClient->flush();
        }
    }

    public function exceptionHandler( \Throwable $exception ): void
    {
        if ( $this->_telemetryClient === null ) {
            return;
        }

        $this->_telemetryClient->trackException( $exception );
        $this->_telemetryClient->flush();
    }
}
