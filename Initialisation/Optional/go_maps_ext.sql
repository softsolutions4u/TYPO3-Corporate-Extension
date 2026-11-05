-- Demo records of the corporate template for EXT:go_maps_ext
-- Imported automatically when the extension is installed (see InitializeDemoSite).

INSERT INTO tx_gomapsext_domain_model_map (uid, pid, tstamp, crdate, deleted, hidden, starttime, endtime, sys_language_uid, l10n_parent, title, width, height, zoom, addresses, show_addresses, show_categories, kml_url, kml_preserve_viewport, kml_local, scroll_zoom, zoom_min, zoom_max, longitude, latitude, geolocation, preview_image, draggable, double_click_zoom, marker_cluster, marker_cluster_zoom, marker_cluster_size, marker_cluster_style, marker_search, default_type, scale_control, streetview_control, fullscreen_control, zoom_control, map_type_control, map_types, show_route, calc_route, travel_mode, unit_system, styled_map_name, styled_map_code) VALUES
(1, 1, 1548322543, 1548322084, 0, 0, 0, 0, 0, 0, 'map', '100%', '500px', 7, 1, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, '', 0, 0, 0, 1, 1, 1, 1, '0,1,2', 0, 0, 0, 2, '', '');

INSERT INTO tx_gomapsext_domain_model_address (uid, pid, tstamp, crdate, deleted, hidden, starttime, endtime, sys_language_uid, l10n_parent, map, categories, title, street, zip, city, latitude, longitude, address, marker, image_size, image_width, image_height, info_window_content, info_window_link, info_window_images, close_by_click, open_by_click, opened) VALUES
(1, 1, 1548322030, 1548322030, 0, 0, 0, 0, 0, 0, 0, 0, 'map', '', '', '', 46.947974, 7.447447, 'bern', 0, 0, 0, 0, '', 0, 0, 0, 0, 0);

INSERT INTO tx_gomapsext_map_address_mm (uid_local, uid_foreign, sorting, sorting_foreign) VALUES
(1, 1, 1, 0);
