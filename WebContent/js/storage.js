/**
 * Storage
 */
StorageManager = (function()
{
	var _namespace = '';

	/**
	 * Stores data in localStorage
	 *
	 * @param String key
	 * @param String value
	 */
	function _store(key, value) {
		localStorage[_namespace + key] = value;
	}


	/**
	 * Gets data from localStorage
	 *
	 * @param String key
	 * @param String value
	 *
	 * @return mixed [string || undefined]
	 */
	function _get(key) {
		return localStorage[_namespace + key]
			? localStorage[_namespace + key]
			: undefined;
	}


	/**
	 * Removes data from localStorage
	 *
	 * @param String key
	 */
	function _remove(key) {
		if (localStorage[_namespace + key]) {
			localStorage.removeItem(_namespace + key);
			return true;
		} else {
			return false;
		}
	}


	/**
	 * Clear data from localStorage with namespace
	 *
	 * @param String key
	 */
	function _clear() {
		var ts = _get('ts');
		var version = _get('version');
		var toClear = Array();
		for (var i=0; i < localStorage.length; i++) {
			key = localStorage.key(i);
			if (key.indexOf(_namespace) === 0) {
				toClear.push(key);
			}
		}
		for (var i=0; i < toClear.length; i++) {
			localStorage.removeItem(toClear[i]);
		}

		_store('ts', ts);
		_store('version', version);
	}

	/**
	 * Initialize generator storage
	 *
	 * @param String namespace
	 * @param String appVersion
	 * @param Integer ttl TTL of generator data storage in seconds
	 */
	function _init(namespace, appVersion, ttl) {
		_namespace = namespace + ':';
		now = parseInt((new Date()).getTime().toString());

		// Check ttl and version
		if (parseInt(_get('ts')) + (ttl * 1000) < now || _get('version') != appVersion) {
			_clear();
		}

		_store('ts', now);
		_store('version', appVersion);
	}


	/**
	 * Public interface
	 *
	 */
	return typeof(Storage) !== 'undefined'
		? {store: _store, get: _get, remove: _remove, clear: _clear, init: _init}
		: {store: function() {}, get: function() {return undefined;}, remove: function() {return false;}, clear: function() {}, init: function() {}};
})();