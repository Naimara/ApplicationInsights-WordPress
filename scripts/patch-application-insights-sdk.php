<?php
/**
 * Removes deprecated utf8_encode() usage from the abandoned Microsoft PHP SDK.
 * JSON from json_encode() is already UTF-8; no transcoding is required.
 */

$file = dirname( __DIR__ ) . '/vendor/microsoft/application-insights/ApplicationInsights/Channel/Telemetry_Channel.php';

if ( ! is_readable( $file ) ) {
    exit( 0 );
}

$content = file_get_contents( $file );
$search  = '$body = utf8_encode($serializedTelemetryItem);';
$replace = '$body = $serializedTelemetryItem;';

if ( strpos( $content, $search ) === false ) {
    exit( 0 );
}

file_put_contents( $file, str_replace( $search, $replace, $content ) );
