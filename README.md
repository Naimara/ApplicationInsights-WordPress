# Application Insights WordPress Plugin

Integrates a WordPress site with Azure Application Insights.

## Maintainers and origin

| Role | Name |
|------|------|
| **Organization / maintainer** | [Naimara](https://github.com/Naimara) |
| **Developer** (2.4+) | Maximiliano Sorribas |

This is a **community fork** of the original [Microsoft AppInsights-WordPress](https://github.com/Microsoft/AppInsights-WordPress) plugin, which is no longer maintained upstream. Active repository: [github.com/Naimara/ApplicationInsights-WordPress](https://github.com/Naimara/ApplicationInsights-WordPress).

This fork is **not affiliated with, endorsed by, or sponsored by Microsoft Corporation**. It sends telemetry to Application Insights using your own instrumentation key, as documented by Microsoft for the Azure service.

## Copyright and license

The software is licensed under the [MIT License](LICENSE).

- **Original work:** Copyright (c) 2018 Microsoft Corporation.
- **Fork and modifications from 2.4 onward:** Copyright (c) 2025-2026 Naimara.

Distribution and modification must retain the copyright and permission notices in `LICENSE`, as required by MIT.

**Trademarks:** Microsoft, Azure, and Application Insights are trademarks of Microsoft Corporation. All other trademarks are the property of their respective owners.

## Version and runtime

**Version 2.4** — requires **PHP 8.3** (tested with 8.3.36). Run `composer install --no-security-blocking` so dependencies and the SDK patch are applied; include the `vendor/` directory when deploying without Composer on the server.

Plugin details and changelog: [README.txt](README.txt). Contributing: [CONTRIBUTING.md](CONTRIBUTING.md).